/**
 * AJAX Handler Framework
 * Reusable functions for common AJAX operations
 */

const AjaxHandler = {
    /**
     * Configuration
     */
    config: {
        loadingText: '<i class="fa fa-spinner fa-spin"></i> Loading...',
        errorTitle: 'Error',
        successTitle: 'Success',
        deleteConfirmTitle: 'Are you sure?',
        deleteConfirmText: 'This action cannot be undone.',
        deleteConfirmButton: 'Yes, delete it!',
        cancelButton: 'Cancel'
    },

    /**
     * Show loading indicator
     */
    showLoading: function(element) {
        if (typeof element === 'string') {
            element = $(element);
        }
        element.html(this.config.loadingText);
    },

    /**
     * Show success message using SweetAlert2
     */
    showSuccess: function(message, callback) {
        Swal.fire({
            icon: 'success',
            title: this.config.successTitle,
            text: message,
            confirmButtonText: 'OK',
            timer: 3000
        }).then(callback);
    },

    /**
     * Show error message using SweetAlert2
     */
    showError: function(message) {
        Swal.fire({
            icon: 'error',
            title: this.config.errorTitle,
            html: message,
            confirmButtonText: 'OK'
        });
    },

    /**
     * Show confirmation dialog
     */
    confirm: function(options, onConfirm, onCancel) {
        const defaults = {
            title: this.config.deleteConfirmTitle,
            text: this.config.deleteConfirmText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: this.config.deleteConfirmButton,
            cancelButtonText: this.config.cancelButton
        };

        const settings = $.extend({}, defaults, options);

        Swal.fire(settings).then((result) => {
            if (result.isConfirmed && typeof onConfirm === 'function') {
                onConfirm();
            } else if (result.isDismissed && typeof onCancel === 'function') {
                onCancel();
            }
        });
    },

    /**
     * Generic AJAX request
     */
    request: function(options) {
        const defaults = {
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                if (options.loadingElement) {
                    AjaxHandler.showLoading(options.loadingElement);
                }
            },
            error: function(xhr, status, error) {
                let errorMsg = 'An error occurred. Please try again.';
                
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                } else if (xhr.responseText) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        errorMsg = response.message || errorMsg;
                    } catch (e) {
                        errorMsg = xhr.responseText;
                    }
                }
                
                AjaxHandler.showError(errorMsg);
                
                if (typeof options.onError === 'function') {
                    options.onError(xhr, status, error);
                }
            }
        };

        const settings = $.extend({}, defaults, options);
        return $.ajax(settings);
    },

    /**
     * Load data via AJAX
     */
    load: function(url, data, onSuccess, onError) {
        return this.request({
            url: url,
            type: 'GET',
            data: data,
            success: onSuccess,
            onError: onError
        });
    },

    /**
     * Create/Insert data via AJAX
     */
    create: function(url, formData, onSuccess, onError) {
        return this.request({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    AjaxHandler.showSuccess(response.message || 'Record created successfully!', function() {
                        if (typeof onSuccess === 'function') {
                            onSuccess(response);
                        }
                    });
                } else {
                    AjaxHandler.showError(response.message || 'Failed to create record.');
                }
            },
            onError: onError
        });
    },

    /**
     * Update data via AJAX
     */
    update: function(url, formData, onSuccess, onError) {
        return this.request({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.success) {
                    AjaxHandler.showSuccess(response.message || 'Record updated successfully!', function() {
                        if (typeof onSuccess === 'function') {
                            onSuccess(response);
                        }
                    });
                } else {
                    AjaxHandler.showError(response.message || 'Failed to update record.');
                }
            },
            onError: onError
        });
    },

    /**
     * Delete data via AJAX with confirmation
     */
    delete: function(url, data, onSuccess, onError, confirmOptions) {
        this.confirm(confirmOptions, function() {
            AjaxHandler.request({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        AjaxHandler.showSuccess(response.message || 'Record deleted successfully!', function() {
                            if (typeof onSuccess === 'function') {
                                onSuccess(response);
                            }
                        });
                    } else {
                        AjaxHandler.showError(response.message || 'Failed to delete record.');
                    }
                },
                onError: onError
            });
        });
    },

    /**
     * Submit form via AJAX
     */
    submitForm: function(formElement, onSuccess, onError) {
        const form = $(formElement);
        const url = form.attr('action');
        const method = form.attr('method') || 'POST';
        const formData = form.serialize();

        // Disable submit button
        const submitBtn = form.find('button[type="submit"], input[type="submit"]');
        const originalBtnText = submitBtn.html();
        submitBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Processing...');

        return this.request({
            url: url,
            type: method,
            data: formData,
            success: function(response) {
                submitBtn.prop('disabled', false).html(originalBtnText);
                
                if (response.success) {
                    AjaxHandler.showSuccess(response.message || 'Form submitted successfully!', function() {
                        if (typeof onSuccess === 'function') {
                            onSuccess(response);
                        }
                    });
                } else {
                    // Show validation errors
                    if (response.errors) {
                        let errorHtml = '<ul style="text-align:left;">';
                        for (let field in response.errors) {
                            errorHtml += '<li>' + response.errors[field] + '</li>';
                        }
                        errorHtml += '</ul>';
                        AjaxHandler.showError(errorHtml);
                    } else {
                        AjaxHandler.showError(response.message || 'Form submission failed.');
                    }
                }
            },
            onError: function(xhr, status, error) {
                submitBtn.prop('disabled', false).html(originalBtnText);
                if (typeof onError === 'function') {
                    onError(xhr, status, error);
                }
            }
        });
    },

    /**
     * Initialize server-side DataTable
     */
    initDataTable: function(tableElement, options) {
        const defaults = {
            processing: true,
            serverSide: true,
            responsive: true,
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            language: {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>',
                emptyTable: "No records found",
                zeroRecords: "No matching records found"
            },
            drawCallback: function(settings) {
                // Re-initialize tooltips after table draw
                $('[data-toggle="tooltip"]').tooltip();
            }
        };

        const settings = $.extend(true, {}, defaults, options);
        return $(tableElement).DataTable(settings);
    },

    /**
     * Reload DataTable
     */
    reloadDataTable: function(table, resetPaging) {
        if (resetPaging === undefined) {
            resetPaging = false;
        }
        table.ajax.reload(null, resetPaging);
    }
};

// Make it globally available
window.AjaxHandler = AjaxHandler;


$(document).ready(function() {
    // Initialize the date picker for the original due date field
    $('#dueDatePicker')
        .datepicker({
            //format: 'yyyy/mm/dd'
        })
        .on('changeDate', function(evt) {
            // Revalidate the date field
            $('#taskForm').formValidation('revalidateField', $('#dueDatePicker').find('[name="dueDate[]"]'));
        });

    $('#taskForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                'task[]': {
                    // The task is placed inside a .col-xs-6 element
                    row: '.col-xs-6',
                    validators: {
                        notEmpty: {
                            message: 'The task is required'
                        }
                    }
                },
                'dueDate[]': {
                    // The due date is placed inside a .col-xs-4 element
                    row: '.col-xs-4',
                    validators: {
                        notEmpty: {
                            message: 'The due date is required'
                        },
                        date: {
                            //format: 'YYYY/MM/DD',
                            min: new Date(),
                            message: 'The due date is not valid'
                        }
                    }
                }
            }
        })

        .on('added.field.fv', function(e, data) {
            if (data.field === 'dueDate[]') {
                // The new due date field is just added
                // Create a new date picker
                data.element
                    .parent()
                    .datepicker({
                        //format: 'yyyy/mm/dd'
                    })
                    .on('changeDate', function(evt) {
                        // Revalidate the date field
                        $('#taskForm').formValidation('revalidateField', data.element);
                    });
            }
        })

        // Add button click handler
        .on('click', '.addButton', function() {
            var $template = $('#taskTemplate'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);

            // Add new fields
            // Note that we DO NOT need to pass the set of validators
            // because the new field has the same name with the original one
            // which its validators are already set
            $('#taskForm')
                .formValidation('addField', $clone.find('[name="task[]"]'))
                .formValidation('addField', $clone.find('[name="dueDate[]"]'))
        })

        // Remove button click handler
        .on('click', '.removeButton', function() {
            var $row = $(this).closest('.form-group');

            // Remove fields
            $('#taskForm')
                .formValidation('removeField', $row.find('[name="task[]"]'))
                .formValidation('removeField', $row.find('[name="dueDate[]"]'));

            // Remove element containing the fields
            $row.remove();
        });
});

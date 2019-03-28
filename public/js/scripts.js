(function($) {
    $.fn.profile = function(method, params) {
        return profileMethods[method].apply(this, [params]);
    }

    var profileMethods = {
        
        field_index: 0,

        init: function() {
            console.log('init');
        },
        
        edit: function(params) {
            
            profileMethods.field_index = params.field_index;
            console.log(profileMethods.field_index);
            
            $('input').focus(function() {
                if ($('input').hasClass('is-invalid')) {
                    $(this).removeClass('is-invalid');
                }
            });
            
            $('#addField').on('click', function() {
                $('.form-group').last().before('<div class="form-group"><div class="row"><div class="col-sm"><label>Название поля</label><input type="text" name="field['+profileMethods.field_index+'][name]" class="form-control" ></div><div class="col-sm"><label>Значение</label><input type="text" name="field['+profileMethods.field_index+'][value]" class="form-control" ></div><div class="col-1 my-auto"><a class="removeField" href="javascript:void(0)">Удалить</a></div></div></div>');
                profileMethods.field_index += 1;
                profileMethods.removeField();
            });
            
            profileMethods.removeField();
            
        },
        
        removeField: function() {
            $('.removeField').on('click', function() {
                $(this).closest('.form-group').remove();
            });
        }
    }
})(jQuery);



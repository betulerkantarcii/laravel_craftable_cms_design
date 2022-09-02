import AppForm from '../app-components/Form/AppForm';

Vue.component('<?php echo e($modelJSName); ?>-form', {
    mixins: [AppForm],
    methods: {
        onSuccess(data) {
            if(data.notify) {
                this.$notify({ type: data.notify.type, title: data.notify.title, text: data.notify.message});
            } else if (data.redirect) {
                window.location.replace(data.redirect);
            }
        }
    }
});<?php /**PATH /Users/betulerkantarci/Desktop/artB/vendor/brackets/admin-generator/src/../resources/views/templates/profile/password/form-js.blade.php ENDPATH**/ ?>
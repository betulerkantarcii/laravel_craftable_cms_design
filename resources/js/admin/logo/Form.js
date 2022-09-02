import AppForm from '../app-components/Form/AppForm';

Vue.component('logo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                title:  this.getLocalizedFormDefaults() ,
                enabled:  false ,
                description:  this.getLocalizedFormDefaults() ,
                link:  this.getLocalizedFormDefaults() ,
                
            },
            mediaCollections: ['cover']
        }
    }

});
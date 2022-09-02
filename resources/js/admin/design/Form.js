import AppForm from '../app-components/Form/AppForm';

Vue.component('design-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  this.getLocalizedFormDefaults() ,
                enabled:  false ,
                title:  this.getLocalizedFormDefaults() ,
                link:  this.getLocalizedFormDefaults() ,
                
            },
            mediaCollections: ['cover']
        }
    }
    

});
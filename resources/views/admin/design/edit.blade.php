@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.design.actions.edit', ['name' => $design->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <design-form
                :action="'{{ $design->resource_url }}'"
                :data="{{ $design->toJsonAllLocales() }}"
                :locales="{{ json_encode($locales) }}"
                :send-empty-locales="false"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.design.actions.edit', ['name' => $design->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.design.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </design-form>

        </div>
    
</div>

@endsection
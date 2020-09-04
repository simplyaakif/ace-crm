<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
    <style>
        .dropdown .dropdown-trigger .button.input .angle {
            right: 10px !important;
        }
        .tagged span{
            align-items: center;
            border-radius: 4px;
            display: inline-flex;
            justify-content: center;
            line-height: 1.5;
            padding-left: 0.75em;
            padding-right: 0.75em;
            white-space: nowrap;
            background-color: #209cee;
            color: #fff;
            font-size: 0.8rem;
            font-weight: bold;
            height: 2em;
            box-shadow: 0 1px 1px rgba(10, 10, 10, 0.2);
        }
        .dropdown.vue-select .dropdown-trigger .button.input .control-display .delete {
            right: 24px;
        }
        .dropdown.vue-select .dropdown-menu .dropdown-content .dropdown-item .label.tag {
            right: 10px;
        }
        .dropdown.vue-select .dropdown-trigger .button.input .control-display .field.is-grouped.is-grouped-multiline
        .control:last-child .tags:not(:last-child){
            margin-right: 3px;
        }
    </style>
</head>
<body>

<div id="app">
    <div class="container">
{{--        <div class="columns">--}}
{{--            <div class="column is-one-third">--}}
{{--                <date-interval-filter class="box"--}}
{{--                                      title="Visited Between"--}}
{{--                                      @update="--}}
{{--        intervals.created_at.min = $event.min;--}}
{{--        intervals.created_at.max = $event.max;--}}
{{--        ">--}}
{{--                </date-interval-filter>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <vue-table class="box is-paddingless raises-on-hover is-rounded"--}}
{{--                   path="http://127.0.0.1:8000/examples/table/init"--}}
{{--                   :intervals="intervals"--}}
{{--                   @excel="$toastr.info('You just pressed Excel', 'Event')"--}}
{{--                   @create="$toastr.success('You just pressed Create', 'Event')"--}}
{{--                   @edit="$toastr.warning('You just pressed Edit', 'Event')"--}}
{{--                   @destroy="$toastr.error('You just pressed Delete', 'Event')"--}}
{{--                   id="example">--}}
{{--        </vue-table>--}}

{{--        <v-table-data--}}
{{--                url="{{route("examples.table.queryinit")}}"--}}
{{--                :courses="{{$courses}}"--}}
{{--        ></v-table-data>--}}

        <v-media-manager inline-template>
            <div>
                {{-- manager --}}
                <div v-if="inputName">@include('MediaManager::extras.modal')</div>

                {{-- items selector --}}
                <media-modal item="cover" :name="inputName"></media-modal>

                {{-- for editor --}}
                @include('MediaManager::extras.editor')

                {{-- form --}}
                <div action="" method="">
                    {{-- cover --}}
                    <section>
                        <img :src="cover">
                        <input type="hidden" name="cover" :value="cover"/>
                        <button @click="toggleModalFor('cover')">select cover</button>
                    </section>


                </div>
            </div>
        </v-media-manager>


    </div>
</div>

@stack('styles')
@stack('scripts')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
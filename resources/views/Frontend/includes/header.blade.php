<link href="{{asset('/css/flags.css')}}" rel="stylesheet">
<script src="{{asset('/js/jquery.flagstrap.js')}}"></script>

<header class="navigation"{{-- style="position: fixed;top: 0;background-color: white;z-index: 5000;border-bottom: 1px solid;width: 100%"--}}>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <a class="navbar-brand" href="{{asset('/')}}">
                    <img src="{{asset('/images/logo.png')}}" alt="Logo">
                </a>
            </div>
            <div class="col-md-7" style="text-align: right">
                <ul id="menu">
                    <li class="li_menu"><a href="{{asset('/')}}">{{trans('menu.home')}}</a></li>
                    <li class="li_menu"><a href="{{asset('/venom-categories')}}">{{trans('menu.venom')}}</a></li>
                    <li class="li_menu"><a href="{{asset('/#aboutSection')}}">{{trans('menu.aboutUs')}}</a></li>
                    <li class="li_menu"><a href="{{asset('/contact-us')}}">{{trans('menu.contactUs')}}</a></li>
                    <li class="li_menu">
                        @if(app()->getLocale() == 'en')
                            <div id="languages"
                                 data-selected-country="US"
                                 data-scrollable-height="200px">
                            </div>
                        @elseif(app()->getLocale() == 'ru')
                            <div id="languages"
                                 data-selected-country="RU"
                                 data-scrollable-height="200px">
                            </div>
                        @else
                            <div id="languages"
                                 data-selected-country="AM"
                                 data-scrollable-height="200px">
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<style>
    #menu {
        list-style-type: none;
        display: inline-flex;
    }

    #menu li {
        padding: 18px;
    }

    #menu li:hover {
        color: red;
    }

    #menu ul.dropdown-menu li {
        padding: 0;
    }
</style>

<script>
    $('#languages').flagStrap({
        countries: {
            "US": "United States",
            "AM": "Armenia",
            "RU": "Russia"
        },
        buttonSize: "btn-sm",
        buttonType: "btn",
        labelMargin: "10px",
        scrollable: false,
        scrollableHeight: "350px",
        placeholder: {}
    });

    $('#menu ul.dropdown-menu li:first-child').remove();
    $('#languages').change(function () {
        var lang = $('#languages select option:selected').val();
        $.ajax({
            type: 'get',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {lang: lang},
            url: '/change-locale',
            success: function (response) {
                if (response.success) {
                    location.reload();
                }
            }
        });
    })

</script>


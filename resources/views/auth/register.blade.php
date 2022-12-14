@extends('frontend.master')

@section('content')
    <!--slider***************************************-->
    <section class="modarsy-2">
        <section class="slider" style="height: 238px;">
            <div class="slid" style="height: 238px;">
                <div class="container">
                    <div class="row">
                        <div class="li-list">

                            <a href="#" class="conntact-my active">@lang('main.register_form')</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="with-us text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2>
                            <a href="#">@lang('main.singup_now') - @lang('main.type'. \Request::get('t') )</a>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="modarsyy-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-md-offset-3">
                        <div class="form">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <input type="text" name="type" value="{{ \Request::get('t') }}" hidden>
                            <label class="label" for="first_name">@lang('main.firstname')</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="last_name">@lang('main.lastname')</label>
                            <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="email">@lang('main.email')</label>
                            <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="password">@lang('main.password')</label>
                            <input id="password" type="password" class="form-control" name="password"   required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="password-confirm">@lang('main.repeatpass')</label>
                            <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                            <label class="label" for="city">@lang('main.city')</label>
                            <select id="city" class="form-control" name="city" required>
                                        <option value="Riyadh - ????????????">Riyadh - ????????????</option>
                                        <option value="Dammam - ????????????">Dammam - ????????????</option>
                                        <option value="Safwa - ????????">Safwa - ????????</option>
                                        <option value="Al Qatif - ????????????">Al Qatif - ????????????</option>
                                        <option value="Dhahran - ??????????????">Dhahran - ??????????????</option>
                                        <option value="Al Faruq - ??????????????">Al Faruq - ??????????????</option>
                                        <option value="Khobar - ??????????">Khobar - ??????????</option>
                                        <option value="Jubail - ????????????">Jubail - ????????????</option>
                                        <option value="Sayhat - ????????????????">Sayhat - ????????????????</option>
                                        <option value="Jeddah - ??????">Jeddah - ??????</option>
                                        <option value="Ta'if - ????????????">Ta'if - ????????????</option>
                                        <option value="Mecca - ??????">Mecca - ??????</option>
                                        <option value="Al Hufuf -????????????">Al Hufuf -????????????</option>
                                        <option value="Medina - ????????????">Medina - ????????????</option>
                                        <option value="Rahimah - ??????????">Rahimah - ??????????</option>
                                        <option value="Rabigh - ??????">Rabigh - ??????</option>
                                        <option value="Yanbu` al Bahr - ?????????? ??????????">Yanbu` al Bahr - ?????????? ??????????</option>
                                        <option value="Abqaiq - ????????????">Abqaiq - ????????????</option>
                                        <option value="Mina - ??????">Mina - ??????</option>
                                        <option value="Ramdah - ????????????">Ramdah - ????????????</option>
                                        <option value="Linah - ????????">Linah - ????????</option>
                                        <option value="Abha ????????">Abha ????????</option>
                                        <option value="Jizan - ??????????">Jizan - ??????????</option>
                                        <option value="Al Yamamah - ??????????????">Al Yamamah - ??????????????</option>
                                        <option value="Tabuk - ????????">Tabuk - ????????</option>
                                        <option value="Sambah - ????????">Sambah - ????????</option>
                                        <option value="Ras Tanura - ?????? ??????????">Ras Tanura - ?????? ??????????</option>
                                        <option value="At Tuwal - ????????????">At Tuwal - ????????????</option>
                                        <option value="Sabya- ??????????">Sabya- ??????????</option>
                                        <option value="Buraidah - ??????????">Buraidah - ??????????</option>
                                        <option value="Madinat Yanbu` as Sina`iyah - ???????? ????????????????">Madinat Yanbu` as Sina`iyah - ???????? ????????????????</option>
                                        <option value="Hayil - ????????">Hayil - ????????</option>
                                        <option value="Khulays - ????????">Khulays - ????????</option>
                                        <option value="Khamis Mushait - ???????? ??????????????">Khamis Mushait - ???????? ??????????????</option>
                                        <option value="Ra's al Khafji - ????????????">Ra's al Khafji - ????????????</option>
                                        <option value="Najran - ?????????? ">Najran - ?????????? </option>
                                        <option value="Sakaka - ??????????">Sakaka - ??????????</option>
                                        <option value="Al Bahah - ??????????????????">Al Bahah - ??????????????????</option>
                                        <option value="Jazirah - ??????????????">Jazirah - ??????????????</option>
                                    </select>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                            <label class="label" for="address">@lang('main.adress')</label>

                            <input id="address" type="text" class="form-control" name="address"
                                           value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                            <label class="label" for="phone">@lang('main.phone')</label>

                            <input style="direction: ltr;" id="phone" type="text" class="input-medium bfh-phone form-control"  data-format="05d ddd ddd-dddd" name="phone"
                                           value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                            <label  for="term">
                                <input name="term" id="term" type="checkbox" value="1">
                                @lang('main.term')  <a href="{{ url('/terms') }}" target=" _blank">@lang('main.term_link') </a>
                            </label>

                                    @if ($errors->has('term'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('term') }}</strong>
                                    </span>
                                    @endif

                                    <button type="submit" class="btn btn-primary">
                                        @lang('main.register')
                                    </button>
                        </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </section>







@endsection

@extends('backend.master')



@section('content')

    {{-- <div id="app">
        <example></example>
    </div> --}}
    @push('css')
    {{ Html::style('plugins/jquery-ui/jquery-ui.min.css') }}
    @endpush

    <h4 class="ui horizontal divider">
        القائمة الرئيسية
    </h4>
    {{ Html::ul($errors->all(),['class' => 'ui error message']) }}

    <div class="ui modal aeform">
        <div class="content">
            {{ Form::open(array('route' => 'menu.store', 'class' => 'ui form', 'id' => 'formpage')) }}
            <div class="ui top attached tabular menu">
                <?php  $count = 0; ?>
                @foreach(config('app.locals') as $local)
                    <?php $count++; ?>
                    <a class="<?php  if ($count == 1) {
                        echo ' active';
                    } ?> item" data-tab="{{$local}}">{{$local}}</a>
                @endforeach
            </div>
            <?php  $count2 = 0; ?>

            @foreach(config('app.locals') as $local)
                <?php $count2++; ?>

                <div class="ui bottom attached <?php  if ($count2 == 1) {
                    echo ' active';
                } ?> tab segment" data-tab="{{$local}}">
                    <div class="field">
                        <label>الاسم</label>
                        <input name="title[{{$local}}]" class="form-control" type="text" placeholder="العنوان">

                    </div>

                </div>
            @endforeach
            <div class="fields">
                <div class="twelve wide field">
                    <label>رابط خارجى</label>
                    {!! Form::text('url',  old('url'), array('id'=>'a', 'class'=>'form-control')) !!}
                </div>
                <div class="four wide field">
                    <label>رابط من صفحة</label>
                    {!! Form::select('url',  $pages, null, array('id'=>'b', 'class'=>'form-control')) !!}
                </div>
            </div>

            <div class="field">
                <label>الترتيب</label>
                {!! Form::text('order', old('order'), array('class'=>'form-control')) !!}
            </div>
            <div class="field">
                {!! Form::select('parent_id', $parents_menu , 0, array('class'=>'form-control')) !!}
            </div>

            <div class="actions">
                <button type="submit" class="ui positive right labeled icon button">
                    حفظ
                    <i class="checkmark icon"></i>
                </button>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <table class="ui compact celled definition   table">
        <tbody id="sortable">
        @if (count($menus))

            @foreach($menus as $value)

                @if ($value->parent_id == 0)
                    <tr id="item_{{$value->id}}">
                        <td class="collapsing"><a class="handle"><i class="sort icon"></i></a></td>
                        <td class="one wide">{{$value->order}}</td>
                        <td><strong>{{$value->title}}</strong><br/>
                            @if(is_numeric($value->url))
                                &nbsp;&nbsp;&nbsp;صفحة : <small>{{App\Page::find($value->url)->title}}</small>
                            @else
                                &nbsp;&nbsp;&nbsp; http://{{$value->url}}
                            @endif
                        </td>
                        <td class="two wide">
                            <a href="{{'/dashboard/menu/' . $value->id}}/edit"
                               class="ui left blue mini attached edit_form button icon"><i class="edit icon"></i></a>
                            <a href="{{'/dashboard/menu/' . $value->id}}/delete"
                               class="ui right red mini attached delete_form button icon"><i class="trash icon"></i></a>
                        </td>
                    </tr>
                    @if ( ! $value->children->isEmpty() )
                        @foreach ($value->children as $subMenuItem)
                            <tr style="font-size:12px; color:#2b2e55;">
                                <td class="collapsing"></td>
                                <td> <i class="level up icon"></i> {{$subMenuItem->order}}</td>
                                <td> &nbsp;  <i class="level up icon"></i> <strong>{{$subMenuItem->title}} </strong> (رابط
                                    فرعى)<br/>  &nbsp;  &nbsp;{{$subMenuItem->url}}</td>
                                <td class="two wide">
                                    <a href="{{'/dashboard/menu/' . $subMenuItem->id}}/edit"
                                       class="ui left blue mini attached edit_form button icon"><i
                                                class="edit icon"></i></a>
                                    <a href="{{'/dashboard/menu/' . $subMenuItem->id}}/delete"
                                       class="ui right red mini attached delete_form button icon"><i
                                                class="trash icon"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endif
            @endforeach
        @else
            <tr>
                <td colspan="6" class="ui center aligned"> لا يوجد بيانات</td>
            </tr>
        @endif
        </tbody>

        <tfoot class="full-width">
        <tr>
            <th>
            </th>
            <th colspan="4">
                <button class="ui right floated small primary labeled icon form button">
                    <i class="user icon"></i> رابط جديد
                </button>
            </th>
        </tr>
        </tfoot>
    </table>



    @push('scripts')
    {{ HTML::script('plugins/jquery-ui/jquery-ui.min.js') }}

    <script type="text/javascript">
        $(function () {
            $("#sortable").sortable({
                'containment': 'parent',
                'revert': true,
                helper: function (e, tr) {
                    var $originals = tr.children();
                    var $helper = tr.clone();
                    $helper.children().each(function (index) {
                        $(this).width($originals.eq(index).width());
                    });
                    return $helper;
                },
                'handle': '.handle',
                update: function (event, ui) {
                    $.post('{{ url('/dashboard/menu/order') }}', $(this).sortable('serialize'), function (data) {
                        if (!data.success) {
                            alert('Whoops, something went wrong :/');
                        }
                    }, 'json');
                }
            });
            $(window).resize(function () {
                $('tbody tr').css('min-width', $('tbody').width());
            });

//            $("#sortable").disableSelection();
        });

        $('.aeform.modal')
            .modal('attach events', '.form.button');

        var dis1 = document.getElementById("a");
        dis1.onchange = function () {
            if (this.value != "" || this.value.length > 0) {
                document.getElementById("b").disabled = true;
            } else {
                document.getElementById("b").disabled = false;
            }
        }
        $(document).ready(function () {
            var dis1 = document.getElementById("a");
            if (dis1.value != "" || dis1.value.length > 0) {
                document.getElementById("b").disabled = true;
            } else {
                document.getElementById("b").disabled = false;
            }
        })

    </script>
    @endpush

@endsection
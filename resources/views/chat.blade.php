@extends('layouts.app')

@section('content')

<script type="text/javascript">
    function getCookieValue(k) {
        return (document.cookie.match('(^|; )' + k + '=([^;]*)') || 0)[2]
    }

    function appendUserId() {
        $("#sendMessageForm").on("submit", function () {
            $(this).append("<input type='hidden' name='user_id' value='" + getCookieValue('chatuserid') + "'/>");
        });
        console.log(getCookieValue('chatuserid'));
    }

    //  window.onload = appendUserId;
</script>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3" style="height: 600px">
            <div class="row" style="border-bottom: 1px solid #c8cbcf"> {{--title--}}
                <div class="col-sm-12">
                    <h4>{{$title}}</h4>
                    <code>User1, User2, User3...</code>
                </div>
            </div>

            <div id="content-div"  style="height: 500px; overflow-y: scroll">{{--content--}}
                <ul id="ul-space">
                    <li class="him">By Other User</li>
                    <li class="me">By this User, first message</li>
                    <li class="me">By this User, secondmessage</li>
                    <li class="me">By this User, third message</li>
                    <li class="me">By this User, fourth message</li>
                </ul>
            </div>

            <div class="row" style="height: 41px">{{--send panel--}}
                <div class="col-sm-12">
                    <form action="/chat/endpoint" method="POST" id="sendMessageForm">
                        <input type="hidden" name="chatroom_id" value="{{$id}}">
                        {{csrf_field()}}
                        <div style="display: inline-block; width: 76%">
                            <input type="text" id="content" class="form-control" name="content" style="width: 99%">
                        </div>
                        <div style="display: inline-block; width: 23%">
                            <input type="submit" value="Send" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function sendMessage() {
        var form = $("#sendMessageForm");
        form.submit(function (e) {
            var url = "/chat/endpoint";
            form.append("<input type='hidden' name='user_id' value='" + getCookieValue('chatuserid') + "'/>");
            $.ajax({
                type: "POST",
                url: url,
                data: $("#sendMessageForm").serialize(),
                success:function (data) {
                    console.log(data);
                    // $("#content-div").append(JSON.stringify(data));
                    var data_obj = data[0];
                    var data_obj2 = data[1];
                    var formatted_html = "<li class='me'>"+data_obj.content+"<br><code><small>"+data_obj2.name + " ~ " +data_obj.created_at+"</code></small></li>";

                    $("#ul-space").append(formatted_html);
                },
                error:function (data) {
                    console.log(data);
                }
            });
            e.preventDefault();
            $("#content").val('');

            // var objDiv = document.getElementById("content-div");
            // objDiv.scrollTop = objDiv.scrollHeight;

            $('#content-div').animate({scrollTop: $('#content-div').prop("scrollHeight")}, 500);

            //refresh content div here... i suppose :


        });
    }
    window.onload = sendMessage;
</script>
@endsection
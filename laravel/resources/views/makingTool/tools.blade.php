<div class="" id="contextmenu">
    <ul class="list-group">
        <li class="list-group-item motionName">동작이름</li>
        <div class="list-group-item contextmenu-body">
            
        </div>
        <!--<li class="list-group-item motionTime">동작시간</li>-->
    </ul>
</div>

<div class="tools dragTools">
    <div class="panel panel-danger">
        <div class="panel-heading">도구모음 <a href="#closeTools"><i class="glyphicon glyphicon-remove"></i></a></div>
        <div class="panel-body">
            <div class="tab-panel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#previewContent" aria-controls="previewContent" role="tab" data-toggle="tab">컨텐츠 미리보기</a></li>
                    <li role="presentation"><a href="#record" aria-controls="record" role="tab" data-toggle="tab">녹음</a></li>
                    <li role="presentation"><a href="#fileUpload" aria-controls="fileUpload" role="tab" data-toggle="tab">파일업로드</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <!--컨텐츠 미리보기-->
                <div role="tabpanel" class="tab-pane fade in active" id="previewContent">
                    <div id="book-area" class="col s12 item-list">
                        <div id="books">
                            <div class="hard"><img src="{{secure_asset('img/tiger/title.jpg')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/tiger.jpg')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/page1.png')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/fox.jpg')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/page3.png')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/rabit.jpg')}}"></img></div>
                            <div class=""><img src="{{secure_asset('img/tiger/page5.png')}}"></img></div>
                            <!--<div class=""><img src="{{secure_asset('image/fairytail2-1.JPG')}}"></img></div>-->
                        </div>
                    </div>
                </div>
                
                <!--사용자 녹음-->
                <div role="tabpanel" class="tab-pane fade" id="record">
                    <div id="recording" class="col s12 item-list">
                        <section class="main-controls">
                            <canvas class="visualizer"></canvas> 
                            <button class="record">Record</button>
                            <button class="stop">Stop</button>
                        </section>
                        
                        <section class="sound-clips">
                        </section>
                        
                        <script src="js/recodingView.js"></script>
                    </div>
                </div>
                
                <!--사용자 파일 업로드-->
                <div role="tabpanel" class="tab-pane fade" id="fileUpload">
                    <div class="form-group">
                        <label for="bgmFile">배경음 업로드</label>
                        <input type="file" id="bgmFile">
                        <p class="help-block">배경음을 업로드 해주세요</p>
                        <button id="bgmFileBtn" class="btn btn-primary">배경음 업로드</button>
                    </div>
                    <div class="form-group">
                        <label for="effectFile">효과음 업로드</label>
                        <input type="file" id="effectFile">
                        <p class="help-block">효과음을 업로드 해주세요</p>
                        <button id="effectFileBtn" class="btn btn-primary">효과음 업로드</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
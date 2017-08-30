<!-- Modal Trigger -->
<!--<a class="modal-trigger waves-effect waves-light btn" href="#modal1">Modal</a>-->

<!-- Modal Structure -->
<div id="keyword" class="makeModal modal">
    <form action="{{secure_url('searchProduct')}}" method="post" class="col s12" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="col s12 m12">
                    <h4>키워드검색</h4>
                    <hr>
                </div>
                <div class="col s12 m12">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" id="contentTitle" name="query"/>
                            <label for="contentTitle">키워드입력</label>
                        </div>
                    </div>
                    {{csrf_field()}}
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type='submit' class="modal-action modal-close waves-effect waves-green btn-flat ">검색</button>
        </div>
    </form>
</div>
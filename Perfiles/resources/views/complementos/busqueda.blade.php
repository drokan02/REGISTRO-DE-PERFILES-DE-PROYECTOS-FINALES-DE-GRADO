<div class="container"> 
        <div class="form-group row">
                <div class="col-4"></div>
                <div class="col-4">
                    <input type="search" placeholder="&#xF002; Buscar" style="font-family:Time, FontAwesome" class="form-control" 
                      name="buscar" autofocus value="{{$buscar}}" autocomplete="off" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
                </div>
                
                <span class="input-group-btn">
                  <button class="btn btn-success"> Buscar</button>
                </span>
        </div>
</div>


  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <form action="{{$url ?? '' }}" method="get">{{ csrf_field() }}
        <div class="form-row">
            <div class="col-md-5">
                <div class="input-group date datepicker dashboard-date mr-4 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                    <span class="input-group-addon bg-transparent">From</span>
                    <input type="date" class="form-control" name="from" value="{{ $from ?? '' }}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group date datepicker dashboard-date mr-2 mb-2 mb-md-0 d-md-none d-xl-flex" id="dashboardDate">
                    <span class="input-group-addon bg-transparent">To</span>
                    <input type="date" class="form-control" name="to" value="{{ $to ?? '' }}">
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success">GO</button>
            </div>
        </div>
    </form>
    
  </div>
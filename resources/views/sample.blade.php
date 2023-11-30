<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Modal title</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="max-width: 600px">
        <div class="uploadFormDialog">
            <img src="{{asset('assets/images/vendor.svg')}}" alt="" class="animate__animated animate__fadeIn" />
            <p class="subject animate__animated animate__fadeInUp">Upload ledger sheet</p>
            <div class="form-group" style="width: 100%">
                <input type="file" class="form-control form-control-sm file animate__animated animate__fadeIn" />
                <label class="helperText right animate__animated animate__fadeIn">Last Updated: 29 Jan 2023 18:30:40</label>
            </div>
            <button class="btn btn-primary animate__animated animate__fadeInUp">
                Submit
                <svg xmlns="http://www.w3.org/2000/svg" class="icon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>
            <a class="link animate__animated animate__fadeInUp">Download Smaple</a>
        </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-sm btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
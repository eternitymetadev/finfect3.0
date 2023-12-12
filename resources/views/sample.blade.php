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


<!-- file input drag and drop -->
 <div class="form-group fileInputGroup">
    <label class="form-label">Other Document</label>
    <svg xmlns="http://www.w3.org/2000/svg" class="clearFileInput" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
    <span class="btn btn-sm btn-primary uploadButton disabled">Update</span>
    <!-- <a href="" target="_blank" class="openImage">
        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
    </a> -->
    <label for="otherDocument" class="dropArea">
        <input type="file" id="otherDocument" class="dragAndDrop file" />
        <img class="rendoredImage animate__animated animate__fadeIn" src="{{asset('assets/images/dragAndDrop.png')}}" alt="rendoredImage" />
        <span class="fileName animate__animated animate__fadeIn"></span>
    </label>
    <span class="invalid-feedback" id="otherDocument-error"></span>
    <div class="process animate__animated animate__fadeIn">
        <svg class="spinner" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
    </div>
</div>


<!-- input type password -->
<div class="form-group">
  <label for="password" class="form-label">
      Password
  </label>
  <input
      id="password"
      type="password"
      class="form-control"
      value=""
      placeholder="********"
      required
  />
  <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
  <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon right" style="display: none" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
  <svg xmlns="http://www.w3.org/2000/svg" class="inputIcon right" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
  <div class="invalid-feedback">Invalid Password</div>
</div>

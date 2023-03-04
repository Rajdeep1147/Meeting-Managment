@extends('layout.layout')

@section('main-section')

<main class="py-6 bg-surface-secondary">
        <!-- Container -->
        <div class="container-fluid max-w-screen-md vstack gap-5">
          <div>
            <label class="form-label">Location</label>
            <input type="text" class="form-control" name="location" id="location" placeholder="Meeting Location">
            </div>
          
          <div>
            <label class="form-label">Client Name</label>
            <input type="text" class="form-control" placeholder="Project name">
          </div>

          <div>
            <label class="form-label">Meeting Time Duration</label>
            <input type="number" class="form-control" name="time" placeholder="Project name">
        <span>Available ( 09:00 AM to 6:00 PM)</span>
        </div>

          
          <div class="row gx-4 gy-5">
            <div class="col-md-6">
              <div>
                <label class="form-label">Start date</label>
                <div class="input-group input-group-inline datepicker">
                  <span class="input-group-text pe-2">
                    <i class="bi bi-calendar"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Select date" data-input>
                </div>
              </div>

              <button type="submit" class="btn btn-sm btn-primary mt-5">
                  <span>Submit</span>
                </button>
            </div>
           
          </div>
        </div>
      </main>

@endsection
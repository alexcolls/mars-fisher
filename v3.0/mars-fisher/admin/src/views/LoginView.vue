<template>
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="card animated zoomIn">
          <div class="card-header">Sign In</div>
          <div class="card-body">
            <form
              name="login-form"
              id="login-form"
              novalidate
              onsubmit="login();return false"
            >
              <div class="form-group">
                <label for="user"> Username </label>
                <input
                  type="text"
                  class="form-control"
                  id="user"
                  name="user"
                  autofocus="true"
                  placeholder=""
                  autocomplete="off"
                />
              </div>
              <div class="form-group">
                <label for="user"> Password </label>
                <input
                  type="password"
                  class="form-control"
                  id="pass"
                  name="pass"
                  placeholder=""
                  autocomplete="off"
                />
              </div>
              <div class="form-group">
                <button class="btn btn-outline-secondary btn-block">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
</template>

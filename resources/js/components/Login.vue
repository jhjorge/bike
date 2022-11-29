<template>
  <div class="container my-5 px-md-5 py-2">
    <div class="row py-md-5 m-0 justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header row justify-content-center mx-1 text-center">
            Painel de Login
          </div>

          <div class="card-body my-4">
            <form method="POST" action="">
              <input type="hidden" name="_token" :value="csrf_token" />
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end"
                  >E-mail</label
                >

                <div class="col-md-6">
                  <input
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                    autofocus
                  />
                </div>
              </div>

              <div class="row mb-4">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-end"
                  >Senha de acesso:</label
                >

                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="current-password"
                  />
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-8 text-center offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["csrf_token"],
};
</script>

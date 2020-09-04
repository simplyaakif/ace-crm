<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-5">
        <div class="card">
          <div class="card-header">Mail Body</div>

          <div class="card-body">
            <form class>
              <textarea
                class="form-control"
                v-model="mailbody"
                name
                id
                cols="30"
                rows="10"
                placeholder="Additional mail body text"
              ></textarea>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-7">{{mailbody}}</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      mailbody: ""
    };
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

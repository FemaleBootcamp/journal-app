<template>
  <modal-component id="confirmationCom">
    <div slot="header">
      <h1>Are You Sure?</h1>
    </div>
    <div slot="body">
      <p>Are you sure you want to delete this journal?</p>
    </div>
    <div slot="footer">
      <button
        type="button"
        class="btn btn-secondary"
        @click="$emit('close')"
        data-dismiss="showConfirmationModal"
      >Close</button>
      <button @click="$emit('delete',id)" type="button" class="btn btn-danger">Delete</button>
    </div>
  </modal-component>
</template>
<script>
export default {
  props: ["id"]
};
</script>
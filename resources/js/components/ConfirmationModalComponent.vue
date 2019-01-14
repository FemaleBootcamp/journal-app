<template>
  <modal-component>
    <div slot="header">
      <h1>Are You Sure?</h1>
    </div>
    <div slot="body">
      <p>Are you sure you want to delete this journal?</p>
    </div>
    <div slot="footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-danger" @click="deleteJournal(journal,journal._id)">Delete</button>
    </div>
  </modal-component>
</template>

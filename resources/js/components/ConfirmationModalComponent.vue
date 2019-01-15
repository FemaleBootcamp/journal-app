<template>
  <modal-component>
    <div slot="header">
      <h1>Are You Sure?</h1>
    </div>
    <div slot="body">
      <p>Are you sure you want to delete this journal?</p>
    </div>
    <div slot="footer">
      <button type="button" class="btn btn-secondary" data-dismiss="showJournalDeleteModal">Close</button>
      <button type="button" class="btn btn-danger" @click="deleteJournal(journal,journal.id)">Delete</button>
    </div>
  </modal-component>
</template>
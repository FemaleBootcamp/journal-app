<template>
  <modal-component>
    <div slot="header">Add new record</div>
    <form @submit.prevent="createJournal" id="add-journal-form">
      <div slot="body">
        <datepicker name="date" format="yyyy-MM-dd" placeholder="Date" class="form-control"></datepicker>
        <input name="database_column" class="form-control mt-2" type="text" placeholder="Text">
        <textarea
          name="plan_next_day"
          class="form-control mt-2"
          id="exampleFormControlTextarea1"
          rows="3"
          placeholder="Plan for next day "
        ></textarea>
        <input
          name="goal_tomorrow"
          class="form-control mt-2"
          type="text"
          placeholder="Goal for tomorrow"
        >
        <div class="form-check mt-2">
          <input
            name="is_achieved"
            class="form-check-input"
            type="checkbox"
            value
            id="defaultCheck1"
          >
          <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>
        </div>
      </div>
      <div slot="footer">
        <button class="btn btn-danger modal-default-button" @click="$emit('close')">Cancel</button>
        <button type="submit" class="btn btn-primary modal-default-button mr-2">Save</button>
      </div>
    </form>
  </modal-component>
</template>
<script>
import Datepicker from "vuejs-datepicker";
export default {
  components: {
    Datepicker
  }
};
</script>
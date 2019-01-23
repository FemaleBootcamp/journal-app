<template>
  <modal-component class="black-text-modal">
    <div slot="header">Edit Journal</div>

    <div slot="body">
      <form @submit="$emit(createJournal())">
        <datepicker v-model="date" name="date" placeholder="Date" class="form-control"></datepicker>
        <input
          v-model="text"
          name="database_column"
          class="form-control mt-2"
          type="text"
          placeholder="Text"
        >
        <textarea
          v-model="plan_tomorrow"
          name="plan_tomorrow"
          class="form-control mt-2"
          id="exampleFormControlTextarea1"
          rows="3"
          placeholder="Plan for next day "
        ></textarea>
        <input
          v-model="goal_tomorrow"
          name="goal_tomorrow"
          class="form-control mt-2"
          type="text"
          placeholder="Goal for tomorrow"
        >
        <div class="form-check mt-2">
          <input
            v-model="goal_status"
            name="goal_status"
            class="form-check-input"
            type="checkbox"
            value
            id="defaultCheck1"
          >
          <label class="form-check-label" for="defaultCheck1">Did you achieve today's goal?</label>

          <span><p v-for="message in messages" :key="message">{{ message }}</p></span>

        </div>
      </form>
    </div>

    <div slot="footer">
      <button class="btn btn-danger modal-default-button" @click="$emit('close')">Cancel</button>
      <button
        type="submit"
        class="btn btn-primary modal-default-button mr-2"
      >Save</button>
    </div>
  </modal-component>
</template>
<script>

</script>

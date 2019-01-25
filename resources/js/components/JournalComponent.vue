<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ text }}</td>
    <td>{{ plan_tomorrow }}</td>
    <td>{{ goal_tomorrow }}</td>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input
          type="checkbox"
          class="custom-control-input"
          id="defaultUnchecked"
          :value="goal_status"
        >
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>

    <td>
      <button type="button" class="btn btn-light">View Details</button>
      <button type="button" class="btn btn-info text-white">Edit</button>
      <button
        id="show-journal-delete-modal"
        @click="$emit('showDeleteModal', id)"
        type="button"
        class="btn btn-danger"
      >
        <i class="fa fa-trash"></i>
      </button>
    </td>
  </tr>
</template>
<script>
export default {
  props: ["id", "date", "text", "plan_tomorrow", "goal_tomorrow", "goal_status"]
};
</script>
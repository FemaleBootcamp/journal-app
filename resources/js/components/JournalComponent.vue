<template>
  <tr>
    <td>{{ date }}</td>
    <td>{{ text }}</td>
    <td>{{ plan_tomorrow }}</td>
    <th scope="row">{{ goal_tomorrow }}</th>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>

    <td>
      <button type="button" class="btn btn-light">View Details</button>
      <button type="button" class="btn btn-primary">Edit</button>
      <button
        id="show-journal-delete-modal"
        @click="$emit('showDeleteModal', id)"
        type="button"
        class="btn btn-danger"
      >Delete</button>
    </td>
  </tr>
</template>
<script>
export default {
  props: ["id", "date", "text", "plan_tomorrow", "goal_tomorrow", "grade"]
};
</script>
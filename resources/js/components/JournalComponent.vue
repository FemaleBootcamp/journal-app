<template>
  <tr>
    <th scope="row">{{ id }}</th>
    <td>{{ date }}</td>
    <td>{{ goalForTomorrow }}</td>
    <td>
      <!-- Default unchecked -->
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
        <label class="custom-control-label" for="defaultUnchecked">Did you achieve?</label>
      </div>
    </td>
    <td>{{ grade }}</td>
    <td>
      <button type="button" class="btn btn-light">View Details</button>
      <button type="button" class="btn btn-primary">Edit</button>
      <button
        id="show-journal-delete-modal"
        type="button"
        class="btn btn-danger"
        @click="$emit(DELETE(this,this.id))"
      >Delete</button>
    </td>
  </tr>  
</template>
<script>
export default {
  props: ["id", "date", "goalForTomorrow", "grade"]
};
</script>
<template>
  <v-container fluid grid-list-xl>
    <h1>Users</h1>
    <v-data-table
      :headers="headers"
      hide-actions
      :items="users"
      class="elevation-1">
      <template slot="items" slot-scope="props">
        <td>{{ props.item.name }}</td>
        <td>{{ props.item.username }}</td>
        <td>{{ props.item.email }}</td>
        <td>{{ props.item.address.city }}</td>
        <td>{{ props.item.phone }}</td>
        <td>{{ props.item.website }}</td>
        <td>{{ props.item.company.name }}</td>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Users',
  created () {
    axios.get('http://192.168.11.11/api/users')
      .then(data => {
        this.users = data.data
      })
      .catch(err => {
        console.err(err)
      })
  },
  data () {
    return {
      headers: [
        {
          text: 'Name',
          sortable: false
        },
        {
          text: 'Username',
          sortable: false
        },
        {
          text: 'Email',
          sortable: false
        },
        {
          text: 'Address',
          sortable: false
        },
        {
          text: 'Phone',
          sortable: false
        },
        {
          text: 'Website',
          sortable: false
        },
        {
          text: 'Company',
          sortable: false
        }
      ],
      users: []
    }
  }
}
</script>

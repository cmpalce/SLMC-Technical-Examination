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
export default {
  name: 'Users',
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
      users: [
      {
          "id": 1,
          "name": "Leanne Graham",
          "username": "Bret",
          "email": "Sincere@april.biz",
          "address": {
            "street": "Kulas Light",
            "suite": "Apt. 556",
            "city": "Gwenborough",
            "zipcode": "92998-3874",
            "geo": {
              "lat": "-37.3159",
              "lng": "81.1496"
            }
          },
          "phone": "1-770-736-8031 x56442",
          "website": "hildegard.org",
          "company": {
            "name": "Romaguera-Crona",
            "catchPhrase": "Multi-layered client-server neural-net",
            "bs": "harness real-time e-markets"
          }
      },
      {
          "id": 2,
          "name": "Ervin Howell",
          "username": "Antonette",
          "email": "Shanna@melissa.tv",
          "address": {
            "street": "Victor Plains",
            "suite": "Suite 879",
            "city": "Wisokyburgh",
            "zipcode": "90566-7771",
            "geo": {
              "lat": "-43.9509",
              "lng": "-34.4618"
            }
          },
          "phone": "010-692-6593 x09125",
          "website": "anastasia.net",
          "company": {
            "name": "Deckow-Crist",
            "catchPhrase": "Proactive didactic contingency",
            "bs": "synergize scalable supply-chains"
          }
        }
      ]
    }
  }
}
</script>

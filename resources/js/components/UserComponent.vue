<template>
  <div>
    <h1>List of Users</h1>
    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button @click="viewUser(user.id)">View</button>
            <button @click="editUser(user.id)">Edit</button>
            <button @click="deleteUser(user.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: [],
    };
  },
  mounted() {
    // Gọi API để lấy danh sách người dùng khi component được mounted
    this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
      try {
        const response = await fetch(
          "http://localhost/BeLaravel/public/api/users"
        );
        if (!response.ok) {
          throw new Error("Failed to fetch users");
        }
        const data = await response.json();
        this.users = data.users; // Giả sử API trả về một đối tượng có thuộc tính 'users' chứa danh sách người dùng
      } catch (error) {
        console.error("Error fetching users:", error);
      }
    },
    viewUser(userId) {
      // Xử lý khi nhấn nút xem user
      console.log("View user with ID:", userId);
    },
    editUser(userId) {
      // Xử lý khi nhấn nút sửa user
      console.log("Edit user with ID:", userId);
    },
    deleteUser(userId) {
      // Xử lý khi nhấn nút xóa user
      console.log("Delete user with ID:", userId);
    },
  },
};
</script>

<style scoped>
/* CSS cho component */
table {
  width: 100%;
  border-collapse: collapse;
}
th,
td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>

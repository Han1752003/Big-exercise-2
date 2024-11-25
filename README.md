Kiến Trúc MVC
Model: Quản lý dữ liệu (User, Task).
View: Hiển thị giao diện (form đăng nhập, danh sách công việc).
Controller: Xử lý logic (đăng ký, đăng nhập, quản lý công việc).
2. MySQL Database
Bảng Users: Lưu thông tin người dùng (id, username, password).
Bảng Tasks: Lưu công việc (id, user_id, title, content, status, priority, completed).
3. Chức Năng
Đăng ký và đăng nhập: Tạo và xác thực tài khoản người dùng.
Quản lý công việc: Thêm, sửa, xóa công việc, cập nhật trạng thái hoàn thành.
Lọc và sắp xếp: Lọc theo mức độ ưu tiên và trạng thái công việc.
4. Quy Trình
Người dùng đăng ký hoặc đăng nhập.
Thực hiện các thao tác quản lý công việc.
Mọi thay đổi được lưu vào MySQL.

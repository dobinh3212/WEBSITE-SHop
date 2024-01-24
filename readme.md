## Các bước thực hiện:
#### Chạy docker 
- `docker-compose up`
#### Truy cập container
- `docker exec -it ... bash`

#### Import file sql webshop.sql
- `mysql -u root -p -h db web_xekhach < webshop.sql`

### Cách kết nối phpMyAdmin
- `link phpMyAdmin http://0.0.0.0:8088/`
#### Đăng Nhập phpMyAdmin
- `Server: db (tên container MySQL trong Docker Compose)`
- `Username: root`
- `Password: (Rỗng vì MYSQL_ROOT_PASSWORD là chuỗi trống)`

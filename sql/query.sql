#insert to Lop
	INSERT INTO lop
	(tenlop, khoaID, kichHoat)
	VALUES('K61-T', '2', '0');


#insert to Khoa
	INSERT INTO khoa
	(tenkhoa, kichhoat)
	VALUES('ĐTVT-FET', 0);
	INSERT INTO khoa
	(tenkhoa, kichhoat)
	VALUES('VLKT', 0);
	
INSERT INTO `cuu_sv` (`csv_id`, `hoten`, `ngaysinh`, `email`, `huyenid`, `anh`, `lopid`, `userid`, `sdt`) VALUES ('16020933', 'Nguyen Trong Ha', '2018-11-07 00:00:00', 'trongha@gmai.com', '3', NULL, '3', '2', NULL);

INSERT into user(username, password, isuser, isadmin)
VALUES ('admin1', '1', 1, 1)

INSERT into cuu_sv(userID, msv, hoten, lopid, ngaysinh)
VALUES (127, 15020834, 'nguyen trong hoang', 5, 19970211)


//Thêm 1 csv 

INSERT into user(username, password, isuser, isadmin)
VALUES ('16020933', '1', 1, 0);
INSERT into cuu_sv(userID, msv, hoten, lopid, ngaysinh)
VALUES ((SELECT MAX(userID) FROM user), 15020934, 'nguyen trong hoangggg', 5, 19970211);

s1 = INSERT into user(username, password, isuser, isadmin)
VALUES ('
s2 = , '1', 1, 0);
INSERT into cuu_sv(userID, msv, hoten, lopid, ngaysinh)
VALUES ((SELECT MAX(userID) FROM user), 

<?php

use yii\db\Migration;

class m170419_155757_structure extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170419_155757_structure cannot be reverted.\n";

        return false;
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTinhTrangHonNhanTable();
        $this->createPhongBanTable();
        $this->createChucVuTable();
        $this->createNhanVienTable();
        $this->createNhanVienForeignKeys();
        $this->createLichCongTacTable();
        $this->createLichCongTacForeignKeys();
        $this->createNghiPhepTable();
        $this->createNghiPhepForeignKeys();
    }

    private function createTinhTrangHonNhanTable()
    {
        $this->createTable(
            '{{%tinhtranghonnhan}}',
            [
                'id' => $this->primaryKey(),
                'tinhtranghonnhan' => $this->string(),
                'ngayTao' => $this->dateTime(),
                'ghiChu' => $this->string(),
            ],
            'ENGINE=InnoDB'
        );
    }

    private function createPhongBanTable()
    {
        $this->createTable(
            '{{%phongban}}',
            [
                'id' => $this->primaryKey(),
                'tenPhongBan' => $this->string(),
                'ngayTao' => $this->dateTime(),
                'ghiChu' => $this->string(),
            ],
            'ENGINE=InnoDB'
        );
    }

    private function createChucVuTable()
    {
        $this->createTable(
            '{{%chucvu}}',
            [
                'id' => $this->primaryKey(),
                'tenChucVu' => $this->string(),
                'ngayTao' => $this->dateTime(),
                'ghiChu' => $this->string(),
            ],
            'ENGINE=InnoDB'
        );
    }

    private function createNhanVienTable()
    {
        $this->createTable(
            '{{%nhanvien}}',
            [
                'id' => $this->primaryKey(),
                'hoVaTen' => $this->string(),
                'tenVietTat' => $this->string(),
                'email' => $this->string(),
                'facebook' => $this->string(),
                'diaChi' => $this->string(),
                'gioiTinh' => $this->integer(),
                'soDienThoai' => $this->dateTime(),
                'ngaySinh' => $this->string(),
                'cmtnd' => $this->string(),
                'sotkNganHang' => $this->string(),
                'ttHonNhanId' => $this->integer(),
                'phongBanId' => $this->integer(),
                'chucVuId' => $this->string(),
                'ngayTao' => $this->dateTime(),
                'ngayCapNhat' => $this->dateTime(),
                'ghiChu' => $this->string(),
                'phongBanId' => $this->integer(11),
                'ttHonNhanId' => $this->integer(11),
                'chucVuId' => $this->integer(11),
            ],
            'ENGINE=InnoDB'
        );
    }
    private function createNhanVienForeignKeys()
    {
        $this->addForeignKey('fk_nhanvien_phongban', 'NhanVien','phongBanID', 'phongban', 'id', 'CASCADE');
        $this->addForeignKey('fk_nhanvien_tinhtranghonnhan', 'NhanVien','ttHonNhanId', 'tinhtranghonnhan', 'id', 'CASCADE');
        $this->addForeignKey('fk_nhanvien_chucvu', 'NhanVien','chucVuID', 'chucvu', 'id', 'CASCADE');
    }

    private function createLichCongTacTable()
    {
        $this->createTable(
            '{{%lichcongtac}}',
            [
                'id' => $this->primaryKey(),
                'nhanVienId' => $this->integer(),
                'lichCongTac' => $this->string(),
                'ngayCapNhat' => $this->dateTime(),
                'ngayTao' => $this->dateTime(),
                'ghiChu' => $this->string(),
                'nhanVienId' => $this->integer(11),
            ],
            'ENGINE=InnoDB'
        );
    }
    private function createLichCongTacForeignKeys()
    {
        $this->addForeignKey('fk_lichcongtac_nhanvien', 'LichCongTac','NhanVienId', 'nhanvien', 'id', 'CASCADE');
    }

    private function createNghiPhepTable()
    {
        $this->createTable(
            '{{%nghiphep}}',
            [
                'id' => $this->primaryKey(),
                'nhanVienId' => $this->integer(),
                'lydo' => $this->string(),
                'tuNgay' => $this->dateTime(),
                'toiNgay' => $this->dateTime(),
                'caNghi' => $this->integer(),
                'trangThai' => $this->integer(),
                'ngayTao' => $this->dateTime(),
                'nhanVienId' => $this->integer(11),
            ],
            'ENGINE=InnoDB'
        );
    }
    private function createNghiPhepForeignKeys()
    {
        $this->addForeignKey('fk_nghiphep_nhanvien', 'NghiPhep','NhanVienId', 'nhanvien', 'id', 'CASCADE');
    }

    public function down()
    {
        echo "m170419_095757_database_1 cannot be reverted.\n";

        return false;
    }
}

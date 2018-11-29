# VIEW LIBUR
CREATE VIEW view_libur AS
SELECT kode_libur, MIN(tgl_libur) AS mulai , MAX(tgl_libur) AS selesai, keterangan_libur FROM `libur` GROUP BY kode_libur

# VIEW CUTI
CREATE VIEW view_cuti AS
SELECT kode_cuti, pin, MIN(tgl_cuti) AS mulai , MAX(tgl_cuti) AS selesai, keterangan FROM `cuti` GROUP BY kode_cuti

# VIEW TUGAS
CREATE VIEW view_tugas AS
SELECT kode_tugas, pin, MIN(tgl_tugas) AS mulai , MAX(tgl_tugas) AS selesai, keterangan FROM `tugas` GROUP BY kode_tugas
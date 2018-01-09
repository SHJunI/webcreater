select * from test_table;

insert into test_table2 values
(3,'teste2','테스터2','010-1234-5678','2018-01-08');

select test_table.no, test_table2.no from test_table
join test_table2
on test_table.no = test_table2.no
and test_table.no = 1;
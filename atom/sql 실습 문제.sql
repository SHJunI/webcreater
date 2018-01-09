select * from stdtb1;
select * from clubtb1;
select * from stdclubtb1;

-- 1). 학생테이블, 동아리 테이블,학생 - 동아리 테이블을 이용해서 학생을 기준으로 
-- 학생 이름, /지역/가입한 동아리 / 동아리 이름을 출력하자 

select stdtb1.*,clubtb1.* from stdclubtb1 inner join stdtb1 using(stdname)
inner join clubtb1 using(clubname) order by stdtb1.stdname;

-- 2). 동아리를 기준으로 가입한 학생의 목록을 출력하자 

select clubtb1.*, stdtb1.* from stdclubtb1 inner join clubtb1 using(clubname)
inner join stdtb1 using(stdname) order by clubtb1.clubname;

-- 3). 동아리에 가입하지 않은 학생 성시경은 출력이 안됐다.
-- 3_1. 아웃터 조인으로 동아리에 가입하지 않은 학생도 출력되도록 수정해보자

select clubtb1.*, stdtb1.* from stdtb1 left outer join stdclubtb1 using(stdname)
left outer join clubtb1 using(clubname) order by clubtb1.clubname;

-- 4). 이제는 동아리를 기준으로 가입한 학생을 출력하되, 가입학생이 하나도 없는 동아리도 출력되게 해보자
-- 5). 클럽을 기준으로 조인을 해야 하므로 두 번재 조인은 라이트 아우터 조인으로 처리 해서 
-- clubTbl이 조인의 기준이 되도록 설정하면 된다. 

select clubtb1.*, stdtb1.* from stdtb1 left outer join stdclubtb1 using(stdname) right outer join clubtb1
using(clubname) order by stdtb1.stdname;

-- 6).  동아리에 가입하지 않은 학생도 출력되고 학생이 한명도 없는 동아리도 출력되게 하자 

select stdtb1.*, clubtb1.* from stdtb1 left outer join stdclubtb1 using(stdname)
left outer join clubtb1 using(clubname)
union
select stdtb1.*, clubtb1.* from stdtb1 left outer join stdclubtb1 using(stdname)
right outer join clubtb1 using(clubname);
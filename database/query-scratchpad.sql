create table task_assignment (
  id int not null auto_increment,
  task_id int not null,
  lid_id int not null,
  primary key (id),
  foreign key (task_id) references tasks (id),
  foreign key (lid_id) references leden (id)
);

INSERT INTO task_assignment (task_id, lid_id)
VALUES (3, 3);

select leden.username,
  tasks.title
from task_assignment
  inner join tasks on task_assignment.task_id = tasks.id
  inner join leden on task_assignment.lid_id = leden.id
where leden.username = 'daan'
  and tasks.status = 0;


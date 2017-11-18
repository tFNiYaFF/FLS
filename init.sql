create table lots(
    title varchar(300),
    description varchar(30000),
    deadline text,
    logo varchar(100),
    id integer  PRIMARY KEY AUTOINCREMENT,
    user varchar(100)
);

CREATE TABLE bets(
    id integer  PRIMARY KEY AUTOINCREMENT,
    lot_id integer,
    fio varchar(400),
    sum integer,
    choise integer,
    betdate text
);

create table choises(
    id integer PRIMARY KEY AUTOINCREMENT,
    lot_id integer,
    description varchar(800)
);

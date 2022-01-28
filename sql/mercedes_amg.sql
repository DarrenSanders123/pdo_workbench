create table pdo_workbench.mercedes_amg
(
    id           int auto_increment
        primary key,
    model        enum ('A-Class', 'B-Class', 'C-Class', 'D-Class', 'F-Class') not null,
    optie        enum ('Low', 'Simple', 'Normal', 'Better', 'High')           not null,
    color        varchar(7)                                                   not null,
    trekhaak     tinyint default 0                                            not null,
    max_vermogen int                                                          not null,
    max_koppel   int                                                          not null
)
    engine = InnoDB;


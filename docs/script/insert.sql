
-- -----------------------------------------------------
-- INSERT `agendamento`.`status`
-- -----------------------------------------------------
INSERT INTO status VALUES (1, 'tarefa', 0, NOW(), null, null);
INSERT INTO status VALUES (2, 'desenvolvimento', 0, NOW(), null, null);
INSERT INTO status VALUES (3, 'pronto', 0, NOW(), null, null);


-- -----------------------------------------------------
-- INSERT `agendamento`.`projeto`
-- -----------------------------------------------------
INSERT INTO projeto VALUES (1, 'tarefa', 0, NOW(), null, null);
INSERT INTO preguntas_frecuentes (pregunta, respuesta) VALUES 
('¿Cómo funciona esta aplicación para ayudarme a ahorrar dinero?', 'Esta aplicación web funciona como una agenda de ahorro personal. Te permite agregar tus ingresos y gastos, establecer metas de ahorro específicas y te proporciona consejos útiles sobre cómo mejorar tus hábitos financieros. Al llevar un registro detallado de tus finanzas, puedes identificar áreas donde puedes reducir gastos y ahorrar más eficazmente.'),
('¿Cómo puedo realizar un seguimiento de mis ingresos?', 'Puedes realizar un seguimiento de tus ingresos ingresándolos manualmente en la sección de ingresos de la aplicación. Además, la aplicación te permite categorizar tus ingresos para que puedas tener un mejor control y visión de tus fuentes de dinero, facilitando así el cumplimiento de tus metas de ahorro.'),
('¿Qué debo hacer si tengo problemas técnicos?', 'Si experimentas problemas técnicos, primero revisa la sección de Soporte y Ayuda en la aplicación, donde encontrarás respuestas a preguntas frecuentes y guías para resolver problemas comunes.'),
('¿Cómo se asegura la aplicación sobre la protección de mis datos?', 'La aplicación utiliza encriptación de datos y almacenamiento seguro para proteger tu información financiera. Además, cumple con estrictas políticas de privacidad para garantizar que tus datos personales no sean compartidos con terceros sin tu consentimiento. Estas medidas aseguran que tu información esté segura mientras utilizas la aplicación para gestionar tu ahorro personal.');

SELECT * FROM preguntas_frecuentes;

SELECT * FROM tips_ahorro;

SELECT * FROM configuracion;

INSERT INTO configuracion (preferencia, valor) VALUES
('idioma', 'español'),
('idioma', 'inglés');

DESCRIBE configuracion;

SELECT * FROM configuracion;

INSERT INTO configuracion (usuario_id, preferencia, valor) VALUES 
(1, 'idioma', 'español');

INSERT INTO configuracion (usuario_id, preferencia, valor) VALUES 
(1, 'idioma', 'español');

SELECT * FROM traducciones;

SELECT * FROM configuracion;

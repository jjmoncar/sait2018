--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: sait_desarrollo; Type: COMMENT; Schema: -; Owner: jjmoncar
--

COMMENT ON DATABASE sait_desarrollo IS 'base de datos de desarrollo de SAIT';


--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE categoria (
    id_categ integer NOT NULL,
    categoria character varying(50) NOT NULL
);


ALTER TABLE categoria OWNER TO jjmoncar;

--
-- Name: categoria_id_categ_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE categoria_id_categ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE categoria_id_categ_seq OWNER TO jjmoncar;

--
-- Name: categoria_id_categ_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE categoria_id_categ_seq OWNED BY categoria.id_categ;


--
-- Name: departamento; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE departamento (
    id_dpto integer NOT NULL,
    departamento character varying(50) NOT NULL,
    ext_dpto integer,
    activo_dpto boolean DEFAULT true NOT NULL
);


ALTER TABLE departamento OWNER TO jjmoncar;

--
-- Name: departamento_id_dpto_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE departamento_id_dpto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE departamento_id_dpto_seq OWNER TO jjmoncar;

--
-- Name: departamento_id_dpto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE departamento_id_dpto_seq OWNED BY departamento.id_dpto;


--
-- Name: solicitud; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE solicitud (
    id_solicitud integer NOT NULL,
    ced_usuario character(8) NOT NULL,
    fecha_solic date NOT NULL,
    dias_resp integer,
    motivo_solic character varying(250) NOT NULL,
    observ_solic character varying(500),
    estado_solic character varying(15),
    observ_usuario character varying(250),
    evaluacion_solic character varying(250),
    ced_personal character(8),
    fecha_asig character(10),
    hora_asig character(8),
    hora_solic character(8),
    subcateg integer,
    fecha_resuelta date
);


ALTER TABLE solicitud OWNER TO jjmoncar;

--
-- Name: COLUMN solicitud.ced_usuario; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.ced_usuario IS 'Cedula del trabajador UPTP que realiza la solicitud';


--
-- Name: COLUMN solicitud.fecha_solic; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.fecha_solic IS 'Fecha en que se hace la solicitud';


--
-- Name: COLUMN solicitud.ced_personal; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.ced_personal IS 'Cédula del personal de soporte asignado';


--
-- Name: COLUMN solicitud.fecha_asig; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.fecha_asig IS 'Fecha en que se le asigna la solicitud a un uduario DIT';


--
-- Name: COLUMN solicitud.hora_asig; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.hora_asig IS 'Hora en que se le asigna la solicitud a un uduario DIT';


--
-- Name: COLUMN solicitud.hora_solic; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.hora_solic IS 'Hora en que se hace la solicitud';


--
-- Name: COLUMN solicitud.fecha_resuelta; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud.fecha_resuelta IS 'Fecha en que la solicitud cambia su status a RESUELTA';


--
-- Name: solicitud_detalle; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE solicitud_detalle (
    id_sol_detalle integer NOT NULL,
    id_solicitud integer NOT NULL,
    observacion character varying(250),
    fecha_sol_det character(10) NOT NULL,
    hora_sol_det character(8) NOT NULL,
    tipo_usuario integer NOT NULL
);


ALTER TABLE solicitud_detalle OWNER TO jjmoncar;

--
-- Name: COLUMN solicitud_detalle.tipo_usuario; Type: COMMENT; Schema: public; Owner: jjmoncar
--

COMMENT ON COLUMN solicitud_detalle.tipo_usuario IS '1=Admin, 2=DIT, 3=UPTP';


--
-- Name: solicitud_detalle_id_sol_detalle_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE solicitud_detalle_id_sol_detalle_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE solicitud_detalle_id_sol_detalle_seq OWNER TO jjmoncar;

--
-- Name: solicitud_detalle_id_sol_detalle_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE solicitud_detalle_id_sol_detalle_seq OWNED BY solicitud_detalle.id_sol_detalle;


--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE solicitud_id_solicitud_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE solicitud_id_solicitud_seq OWNER TO jjmoncar;

--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE solicitud_id_solicitud_seq OWNED BY solicitud.id_solicitud;


--
-- Name: sub_categoria; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE sub_categoria (
    id_subcateg integer NOT NULL,
    id_categ integer NOT NULL,
    subcategoria character varying(50) NOT NULL
);


ALTER TABLE sub_categoria OWNER TO jjmoncar;

--
-- Name: sub_categoria_id_subcateg_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE sub_categoria_id_subcateg_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE sub_categoria_id_subcateg_seq OWNER TO jjmoncar;

--
-- Name: sub_categoria_id_subcateg_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE sub_categoria_id_subcateg_seq OWNED BY sub_categoria.id_subcateg;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: jjmoncar; Tablespace: 
--

CREATE TABLE usuario (
    cedula character(8) NOT NULL,
    nombre character varying(60) NOT NULL,
    usuario character(15) NOT NULL,
    clave character(12) NOT NULL,
    id_dpto integer NOT NULL,
    nivel integer NOT NULL,
    activo boolean DEFAULT true NOT NULL,
    categoria integer,
    id_usuario integer NOT NULL
);


ALTER TABLE usuario OWNER TO jjmoncar;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: jjmoncar
--

CREATE SEQUENCE usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_id_usuario_seq OWNER TO jjmoncar;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: jjmoncar
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- Name: id_categ; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY categoria ALTER COLUMN id_categ SET DEFAULT nextval('categoria_id_categ_seq'::regclass);


--
-- Name: id_dpto; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY departamento ALTER COLUMN id_dpto SET DEFAULT nextval('departamento_id_dpto_seq'::regclass);


--
-- Name: id_solicitud; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY solicitud ALTER COLUMN id_solicitud SET DEFAULT nextval('solicitud_id_solicitud_seq'::regclass);


--
-- Name: id_sol_detalle; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY solicitud_detalle ALTER COLUMN id_sol_detalle SET DEFAULT nextval('solicitud_detalle_id_sol_detalle_seq'::regclass);


--
-- Name: id_subcateg; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY sub_categoria ALTER COLUMN id_subcateg SET DEFAULT nextval('sub_categoria_id_subcateg_seq'::regclass);


--
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--

INSERT INTO categoria VALUES (1, 'Soporte Técnico');
INSERT INTO categoria VALUES (2, 'Redes');
INSERT INTO categoria VALUES (3, 'Desarrollo de Software');


--
-- Name: categoria_id_categ_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('categoria_id_categ_seq', 3, true);


--
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--

INSERT INTO departamento VALUES (2, 'Talento Humano', 219, true);
INSERT INTO departamento VALUES (1, 'D.I.T. ', 257, true);
INSERT INTO departamento VALUES (4, 'Informática', 247, true);
INSERT INTO departamento VALUES (5, 'Habilitaduría', 272, true);
INSERT INTO departamento VALUES (6, 'Administración', 266, true);
INSERT INTO departamento VALUES (7, 'Planificacion Presup', 252, true);
INSERT INTO departamento VALUES (8, 'Docencia', 211, true);
INSERT INTO departamento VALUES (9, 'Orientación', 229, true);
INSERT INTO departamento VALUES (10, 'Servicios Médicos', 240, true);
INSERT INTO departamento VALUES (11, 'Comision de Grado', 271, true);
INSERT INTO departamento VALUES (12, 'Pasantia', 227, true);
INSERT INTO departamento VALUES (14, 'Contabilidad', 235, true);
INSERT INTO departamento VALUES (15, 'DAINTES', 246, true);
INSERT INTO departamento VALUES (16, 'Biblioteca', 262, true);
INSERT INTO departamento VALUES (17, 'Div. de Inv. Ext. Post y Prod', 274, true);
INSERT INTO departamento VALUES (18, 'Rectoria', 202, true);
INSERT INTO departamento VALUES (19, 'Vice-Rectoria Academica', 207, true);
INSERT INTO departamento VALUES (20, 'Vice-Rectoria Administrativa', 242, true);
INSERT INTO departamento VALUES (21, 'Prog. Socio Económicos', 224, true);
INSERT INTO departamento VALUES (22, 'Tec. de Alimentos', 244, true);
INSERT INTO departamento VALUES (23, 'Servicios Generales', 237, true);
INSERT INTO departamento VALUES (24, 'Bienes Nacionales', 231, true);
INSERT INTO departamento VALUES (25, 'Almacen', 239, true);
INSERT INTO departamento VALUES (26, 'Sindicato Obrero', 233, true);
INSERT INTO departamento VALUES (27, 'Cs. Agropecuarias', 220, true);
INSERT INTO departamento VALUES (28, 'Tec. Naval', 228, true);
INSERT INTO departamento VALUES (29, 'Reproducción', 255, true);
INSERT INTO departamento VALUES (30, 'Mercadeo', 223, true);
INSERT INTO departamento VALUES (31, 'IPSP', 222, true);
INSERT INTO departamento VALUES (32, 'Deporte', 241, true);
INSERT INTO departamento VALUES (33, 'Cultura', 264, true);
INSERT INTO departamento VALUES (34, 'Tec. Administrativa', 225, true);
INSERT INTO departamento VALUES (35, 'Turismo', 226, true);
INSERT INTO departamento VALUES (36, 'Ejecución Presupuestaria', 253, true);
INSERT INTO departamento VALUES (13, 'Ejecucion Presupuestaria', 216, false);
INSERT INTO departamento VALUES (37, 'Planta Física', 215, true);
INSERT INTO departamento VALUES (38, 'Control de Gestión', 215, true);
INSERT INTO departamento VALUES (39, 'Clasificación Docente', 273, true);
INSERT INTO departamento VALUES (40, 'Verificación', 267, true);
INSERT INTO departamento VALUES (41, 'Estadística', 215, true);
INSERT INTO departamento VALUES (42, 'Planta Piloto', 245, true);
INSERT INTO departamento VALUES (43, 'Territorialización', 250, true);
INSERT INTO departamento VALUES (44, 'Div. Servicio Comunitario', 250, true);
INSERT INTO departamento VALUES (45, 'Investig. y Postgrado', 274, true);
INSERT INTO departamento VALUES (46, 'Transporte', 238, true);
INSERT INTO departamento VALUES (47, 'Sindicato de Profesores', 251, true);
INSERT INTO departamento VALUES (48, 'Comedor', 268, true);
INSERT INTO departamento VALUES (3, 'Compras', 213, true);
INSERT INTO departamento VALUES (49, 'Relaciones Publicas', 259, true);
INSERT INTO departamento VALUES (50, 'Control de Estudios', 212, true);
INSERT INTO departamento VALUES (51, 'Centro de Estudiantes', 205, true);
INSERT INTO departamento VALUES (52, 'FAMES', 0, true);
INSERT INTO departamento VALUES (53, 'Curriculo', 256, true);
INSERT INTO departamento VALUES (55, 'Contraloria', 236, true);
INSERT INTO departamento VALUES (56, 'Nómina', 254, true);
INSERT INTO departamento VALUES (57, 'voceria punto rojo', 140, true);
INSERT INTO departamento VALUES (58, 'consultoria juridica', 232, true);
INSERT INTO departamento VALUES (59, 'Servicio Comunitario', 1, true);
INSERT INTO departamento VALUES (60, 'Vigilancia', 2, true);
INSERT INTO departamento VALUES (61, 'SALA VIRTUAL', 122, true);
INSERT INTO departamento VALUES (62, 'PNF Mantenimiento', 128, true);
INSERT INTO departamento VALUES (63, 'Seg. alimentaria', 304, true);
INSERT INTO departamento VALUES (64, 'Coord. Seguimiento y Control ', 278, true);
INSERT INTO departamento VALUES (54, 'FUNDAUPT-PARIA', 814, true);
INSERT INTO departamento VALUES (65, 'Vice-Rectoria Territorialización', 250, true);


--
-- Name: departamento_id_dpto_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('departamento_id_dpto_seq', 65, true);


--
-- Data for Name: solicitud; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--

INSERT INTO solicitud VALUES (1775, '14173431', '2018-01-08', NULL, 'buenos dias feliz año nuevo compañero me urge que me revise dos cpu de la oficina gracias', NULL, 'En Espera', NULL, NULL, NULL, NULL, NULL, '11:38:18', 1, NULL);
INSERT INTO solicitud VALUES (1776, '14422314', '2018-01-08', NULL, 'buenas tarde la siguiente es para solicitar que se presenten a la division de docencia a revisar un equipo de computadora que no quiere encender', NULL, 'En Espera', NULL, NULL, NULL, NULL, NULL, '12:31:02', 1, NULL);


--
-- Data for Name: solicitud_detalle; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--



--
-- Name: solicitud_detalle_id_sol_detalle_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('solicitud_detalle_id_sol_detalle_seq', 2222, true);


--
-- Name: solicitud_id_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('solicitud_id_solicitud_seq', 1776, true);


--
-- Data for Name: sub_categoria; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--

INSERT INTO sub_categoria VALUES (1, 1, 'Revisión y reparación de equipo de computación');
INSERT INTO sub_categoria VALUES (2, 1, 'Revisión y reparación de equipo de Impresora');
INSERT INTO sub_categoria VALUES (3, 1, 'Revisión y reparación de equipo de Monitor');
INSERT INTO sub_categoria VALUES (4, 1, 'Revisión y reparación de equipo de Video Beans');
INSERT INTO sub_categoria VALUES (5, 1, 'Revisión y reparación de equipo de Fotocopiadora');
INSERT INTO sub_categoria VALUES (6, 1, 'Recarga de Toner y cartucho de tinta');
INSERT INTO sub_categoria VALUES (7, 2, 'Revisión de Conexión de red');
INSERT INTO sub_categoria VALUES (8, 2, 'Revisión de punto de red');
INSERT INTO sub_categoria VALUES (9, 2, 'Colocación de punto de red');
INSERT INTO sub_categoria VALUES (10, 3, 'Mantenimiento de Sistemas');
INSERT INTO sub_categoria VALUES (11, 3, 'Soporte de Sistemas');
INSERT INTO sub_categoria VALUES (12, 3, 'Desarrollo de Sistemas');
INSERT INTO sub_categoria VALUES (13, 1, 'Otro');
INSERT INTO sub_categoria VALUES (14, 2, 'Otro');
INSERT INTO sub_categoria VALUES (15, 3, 'Otro');


--
-- Name: sub_categoria_id_subcateg_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('sub_categoria_id_subcateg_seq', 15, true);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: jjmoncar
--

INSERT INTO usuario VALUES ('10879249', 'Cleide Rodriguez', 'CLEIDE         ', '1234        ', 35, 3, true, NULL, 1);
INSERT INTO usuario VALUES ('11828236', 'Carmellys Cordova', 'CARMELLYS      ', '1128        ', 7, 3, true, NULL, 2);
INSERT INTO usuario VALUES ('9933068 ', 'Simón Mundaray', 'POSTGRADO      ', 'postgrado   ', 45, 3, true, NULL, 3);
INSERT INTO usuario VALUES ('15361648', 'Oscar Rodriguez', 'JUAN           ', '1706        ', 41, 3, true, NULL, 4);
INSERT INTO usuario VALUES ('3405409 ', 'Jesus Cabrera', 'JESUS          ', '1234        ', 12, 3, true, NULL, 5);
INSERT INTO usuario VALUES ('8744424 ', 'Rusbert Montoya', 'SAMY           ', '230866samy  ', 1, 2, true, 1, 6);
INSERT INTO usuario VALUES ('13274171', 'Yusmarys Ramirez', 'YUSMARYS       ', '1234        ', 13, 3, true, NULL, 7);
INSERT INTO usuario VALUES ('5869488 ', 'Humberto Perez', 'HUMBERTO       ', '4945        ', 1, 2, false, NULL, 8);
INSERT INTO usuario VALUES ('13074235', 'RONY RODRIGUEZ', 'RONY           ', '7676        ', 1, 2, false, NULL, 9);
INSERT INTO usuario VALUES ('12531631', 'Pedro Caraballo', 'PEDROC         ', '1631        ', 1, 2, true, 1, 10);
INSERT INTO usuario VALUES ('15788720', 'Jackson Ramirez', 'JACKSON        ', '1578        ', 1, 2, true, 2, 11);
INSERT INTO usuario VALUES ('9455688 ', 'Francisco Silva', 'IUT            ', '123         ', 1, 2, true, 3, 12);
INSERT INTO usuario VALUES ('17780205', 'Karwing Meneses', 'KARWING        ', '1045        ', 1, 2, true, 1, 13);
INSERT INTO usuario VALUES ('14291792', 'Jesús Toledo', 'TOLEDO         ', '14291792    ', 1, 2, true, 1, 14);
INSERT INTO usuario VALUES ('14173584', 'Avilus Muñoz', 'AVILUS         ', '1234        ', 2, 3, true, NULL, 15);
INSERT INTO usuario VALUES ('13730695', 'Raiza Toussaint', 'ALIMENTO       ', 'alimento    ', 22, 3, true, NULL, 16);
INSERT INTO usuario VALUES ('13076147', 'Evelio Guerra', 'RRHH           ', 'talentoh    ', 2, 3, true, NULL, 17);
INSERT INTO usuario VALUES ('14220614', 'Oscar Marin', 'OSCAR          ', '14220614    ', 1, 2, true, 0, 18);
INSERT INTO usuario VALUES ('13730592', 'Jorge Gardié', 'JORGE          ', 'camila      ', 1, 2, true, 1, 19);
INSERT INTO usuario VALUES ('17021910', 'Edicto Lopez', 'MANTENIMIENTO  ', '17021910    ', 62, 3, true, NULL, 20);
INSERT INTO usuario VALUES ('14422314', 'Nellys Sanchez', 'NELLYS         ', '1234        ', 8, 3, true, NULL, 21);
INSERT INTO usuario VALUES ('12215750', 'Lill Malave', 'COMPRAS        ', 'compras     ', 3, 3, true, NULL, 22);
INSERT INTO usuario VALUES ('9458106 ', 'Jacqueline Beaumont', 'JACQUELINE     ', '1234        ', 6, 3, true, NULL, 23);
INSERT INTO usuario VALUES ('15883775', 'Deysmar Lopez', 'DEYSMAR        ', '1234        ', 5, 3, true, NULL, 24);
INSERT INTO usuario VALUES ('8743024 ', 'Denice Contrera', 'DENICE         ', 'pastora     ', 55, 3, true, NULL, 25);
INSERT INTO usuario VALUES ('17022773', 'Angel Fernandez', 'COMUNITARIO    ', 'Logica+01   ', 59, 3, true, NULL, 26);
INSERT INTO usuario VALUES ('20124972', 'Jesus Moreno', 'JESUS          ', '20124972    ', 1, 1, true, NULL, 27);
INSERT INTO usuario VALUES ('18413750', 'Davinia Salas', 'DAVINIA        ', '1234        ', 9, 3, true, NULL, 28);
INSERT INTO usuario VALUES ('5877611 ', 'Jovani Viñoles', 'JOVANI         ', '1234        ', 9, 3, true, NULL, 29);
INSERT INTO usuario VALUES ('4947010 ', 'Argelis Rodriguez', 'ARGELIS        ', '91258       ', 64, 3, true, NULL, 30);
INSERT INTO usuario VALUES ('10880006', 'Jesus Cova', 'COVA           ', '1234        ', 58, 3, true, NULL, 31);
INSERT INTO usuario VALUES ('14716688', 'Aristoteles Rodriguez', 'ARISTOTELES    ', 'toteles16   ', 16, 3, true, NULL, 32);
INSERT INTO usuario VALUES ('11603807', 'Indira Virla', 'INDIRA         ', '1234        ', 27, 3, true, NULL, 33);
INSERT INTO usuario VALUES ('14717786', 'Glarisbel España', 'GLARISBEL      ', '1234        ', 14, 3, true, NULL, 34);
INSERT INTO usuario VALUES ('14174857', 'Liris Caraballo', 'DIP            ', 'dip         ', 17, 3, true, NULL, 35);
INSERT INTO usuario VALUES ('13924825', 'Carlos Agreda', 'CARLOS         ', '1234        ', 28, 3, true, NULL, 36);
INSERT INTO usuario VALUES ('11160400', 'Francis Narvaez', 'FRANCIS        ', '1234        ', 50, 3, true, NULL, 37);
INSERT INTO usuario VALUES ('14173431', 'Oswaldo Gomez', 'BIENES         ', '1208        ', 24, 3, true, NULL, 38);
INSERT INTO usuario VALUES ('13273722', 'Hecmar Franco', 'HECMAR         ', '1234        ', 4, 3, true, NULL, 39);
INSERT INTO usuario VALUES ('17216472', 'LAURIMAR RODRIGUEZ', 'LAURIMAR       ', '17216472    ', 34, 3, true, NULL, 40);
INSERT INTO usuario VALUES ('11969048', 'Laura Marcano', 'SEGURIDAD      ', '1234        ', 60, 3, true, NULL, 41);
INSERT INTO usuario VALUES ('9458418 ', 'Ulmharys Martinez', 'PLANIFICACION  ', 'maqueta     ', 7, 3, true, NULL, 42);
INSERT INTO usuario VALUES ('6957756 ', 'Milagros Acosta', 'ACOSTA         ', '1234        ', 32, 3, true, NULL, 43);
INSERT INTO usuario VALUES ('13294252', 'Adaira Torres', 'ADAIRA         ', '13294252    ', 1, 4, true, NULL, 44);
INSERT INTO usuario VALUES ('4668242 ', 'Victor Izquiel', 'VICTORDELVALLE ', '4242423     ', 54, 3, true, NULL, 45);
INSERT INTO usuario VALUES ('12739488', 'Florima Suniaga', 'ADMINISTRACION ', '1234        ', 6, 3, true, NULL, 46);
INSERT INTO usuario VALUES ('17406947', 'Joranxi Diaz', 'MERCADEO       ', '17406947    ', 30, 3, true, NULL, 47);
INSERT INTO usuario VALUES ('10220399', 'Sergio Marcano', 'AGROPECUARIA   ', '1099        ', 27, 3, true, NULL, 48);
INSERT INTO usuario VALUES ('12739172', 'Elizabeth Moya', 'ALMACEN        ', '1234        ', 25, 3, true, NULL, 49);
INSERT INTO usuario VALUES ('11378226', 'Alexander Zerpa', 'CULTURA        ', '1234        ', 33, 3, true, NULL, 50);
INSERT INTO usuario VALUES ('6959914 ', 'Carlos Felce', 'DEPORTE        ', 'chaqueta    ', 32, 3, true, NULL, 51);
INSERT INTO usuario VALUES ('14579116', 'Angel Ortega', 'ANGEL          ', '1980        ', 35, 3, false, NULL, 52);
INSERT INTO usuario VALUES ('0       ', 'Administrador', 'JESUSM         ', '1234        ', 1, 1, true, 0, 53);
INSERT INTO usuario VALUES ('11437651', 'Dinorah Rojas', 'DINOROJAS      ', 'uptp        ', 65, 3, true, NULL, 54);


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: jjmoncar
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 54, true);


--
-- Name: categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id_categ);


--
-- Name: departamento_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (id_dpto);


--
-- Name: solicitud_detalle_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY solicitud_detalle
    ADD CONSTRAINT solicitud_detalle_pkey PRIMARY KEY (id_sol_detalle);


--
-- Name: solicitud_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (id_solicitud);


--
-- Name: sub_categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY sub_categoria
    ADD CONSTRAINT sub_categoria_pkey PRIMARY KEY (id_subcateg);


--
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: jjmoncar; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: solicitud_detalle_id_solicitud_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY solicitud_detalle
    ADD CONSTRAINT solicitud_detalle_id_solicitud_fkey FOREIGN KEY (id_solicitud) REFERENCES solicitud(id_solicitud) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: sub_categoria_id_categ_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY sub_categoria
    ADD CONSTRAINT sub_categoria_id_categ_fkey FOREIGN KEY (id_categ) REFERENCES categoria(id_categ) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_id_dpto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: jjmoncar
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_id_dpto_fkey FOREIGN KEY (id_dpto) REFERENCES departamento(id_dpto) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--


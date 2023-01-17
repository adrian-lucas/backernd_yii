--
-- PostgreSQL database dump
--

-- Dumped from database version 12.2 (Ubuntu 12.2-4)
-- Dumped by pg_dump version 12.2 (Ubuntu 12.2-4)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: alumno; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumno (
    id integer NOT NULL,
    codigo_sis character varying NOT NULL,
    ci character varying NOT NULL,
    nombres character varying NOT NULL,
    apellidos character varying NOT NULL,
    email character varying NOT NULL,
    fecha_nacimiento date NOT NULL,
    contrasenia character varying
);


ALTER TABLE public.alumno OWNER TO postgres;

--
-- Name: alumno_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alumno_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumno_id_seq OWNER TO postgres;

--
-- Name: alumno_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alumno_id_seq OWNED BY public.alumno.id;


--
-- Name: alumno_materia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumno_materia (
    id integer NOT NULL,
    alumno integer NOT NULL,
    materia integer NOT NULL
);


ALTER TABLE public.alumno_materia OWNER TO postgres;

--
-- Name: alumno_materia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alumno_materia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumno_materia_id_seq OWNER TO postgres;

--
-- Name: alumno_materia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alumno_materia_id_seq OWNED BY public.alumno_materia.id;


--
-- Name: aula; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.aula (
    id integer NOT NULL,
    nombre character varying NOT NULL,
    capacidad character varying NOT NULL
);


ALTER TABLE public.aula OWNER TO postgres;

--
-- Name: aula_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.aula_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.aula_id_seq OWNER TO postgres;

--
-- Name: aula_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.aula_id_seq OWNED BY public.aula.id;


--
-- Name: hora; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.hora (
    id integer NOT NULL,
    dia character varying NOT NULL,
    hora_inicio time without time zone NOT NULL,
    hora_fin time without time zone NOT NULL,
    aula integer NOT NULL,
    materia integer NOT NULL
);


ALTER TABLE public.hora OWNER TO postgres;

--
-- Name: hora_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.hora_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.hora_id_seq OWNER TO postgres;

--
-- Name: hora_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.hora_id_seq OWNED BY public.hora.id;


--
-- Name: materia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materia (
    id integer NOT NULL,
    codigo_sis character varying NOT NULL,
    nombre character varying NOT NULL
);


ALTER TABLE public.materia OWNER TO postgres;

--
-- Name: materia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materia_id_seq OWNER TO postgres;

--
-- Name: materia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materia_id_seq OWNED BY public.materia.id;


--
-- Name: nota; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nota (
    id integer NOT NULL,
    gestion character varying NOT NULL,
    alumno integer NOT NULL,
    materia integer NOT NULL,
    puntaje numeric NOT NULL
);


ALTER TABLE public.nota OWNER TO postgres;

--
-- Name: nota_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nota_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nota_id_seq OWNER TO postgres;

--
-- Name: nota_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nota_id_seq OWNED BY public.nota.id;


--
-- Name: alumno id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno ALTER COLUMN id SET DEFAULT nextval('public.alumno_id_seq'::regclass);


--
-- Name: alumno_materia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia ALTER COLUMN id SET DEFAULT nextval('public.alumno_materia_id_seq'::regclass);


--
-- Name: aula id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aula ALTER COLUMN id SET DEFAULT nextval('public.aula_id_seq'::regclass);


--
-- Name: hora id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hora ALTER COLUMN id SET DEFAULT nextval('public.hora_id_seq'::regclass);


--
-- Name: materia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materia ALTER COLUMN id SET DEFAULT nextval('public.materia_id_seq'::regclass);


--
-- Name: nota id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota ALTER COLUMN id SET DEFAULT nextval('public.nota_id_seq'::regclass);


--
-- Data for Name: alumno; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alumno (id, codigo_sis, ci, nombres, apellidos, email, fecha_nacimiento, contrasenia) FROM stdin;
3	12345	7894-b	adrian german	mamani	aduardo@gmail.com	2000-05-15	\N
1	eduardo	7894	adrian	vargas	aduardoarraya@gmail.com	2000-05-15	\N
\.


--
-- Data for Name: alumno_materia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alumno_materia (id, alumno, materia) FROM stdin;
1	3	1
2	3	2
3	3	3
4	1	4
5	1	3
\.


--
-- Data for Name: aula; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aula (id, nombre, capacidad) FROM stdin;
1	691A	90
2	691b	90
3	691c	90
4	691F	30
5	692G	25
\.


--
-- Data for Name: hora; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.hora (id, dia, hora_inicio, hora_fin, aula, materia) FROM stdin;
1	lunes	09:45:00	11:15:00	1	1
2	jueves	14:15:00	15:45:00	5	1
3	viernes	08:15:00	09:45:00	3	1
4	lunes	08:15:00	09:45:00	5	2
5	martes	08:15:00	09:45:00	3	2
6	miercoles	08:15:00	09:45:00	4	2
7	miercoles	11:15:00	12:45:00	1	3
8	jueves	11:15:00	12:45:00	2	3
9	viernes	11:15:00	12:45:00	3	3
10	sabado	08:15:00	09:45:00	5	4
11	sabado	09:45:00	11:15:00	1	4
\.


--
-- Data for Name: materia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materia (id, codigo_sis, nombre) FROM stdin;
1	1234	calculo
2	7895	algebra
3	9025	logica
4	7895	programacion
\.


--
-- Data for Name: nota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nota (id, gestion, alumno, materia, puntaje) FROM stdin;
1	2-2022	3	1	55
2	2-2022	3	2	78
3	2-2022	3	3	28
4	2-2022	1	4	95
5	2-2022	1	3	88
\.


--
-- Name: alumno_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_id_seq', 3, true);


--
-- Name: alumno_materia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_materia_id_seq', 5, true);


--
-- Name: aula_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aula_id_seq', 5, true);


--
-- Name: hora_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.hora_id_seq', 11, true);


--
-- Name: materia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materia_id_seq', 4, true);


--
-- Name: nota_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nota_id_seq', 5, true);


--
-- Name: alumno_materia alumno_materia_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_pk PRIMARY KEY (id);


--
-- Name: alumno alumno_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_pk PRIMARY KEY (id);


--
-- Name: aula aula_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.aula
    ADD CONSTRAINT aula_pk PRIMARY KEY (id);


--
-- Name: hora hora_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hora
    ADD CONSTRAINT hora_pk PRIMARY KEY (id);


--
-- Name: materia materia_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materia
    ADD CONSTRAINT materia_pk PRIMARY KEY (id);


--
-- Name: nota nota_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_pk PRIMARY KEY (id);


--
-- Name: alumno_materia alumno_materia_alumnofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_alumnofk FOREIGN KEY (alumno) REFERENCES public.alumno(id);


--
-- Name: alumno_materia alumno_materia_materiafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_materiafk FOREIGN KEY (materia) REFERENCES public.materia(id);


--
-- Name: hora hora_aulafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hora
    ADD CONSTRAINT hora_aulafk FOREIGN KEY (aula) REFERENCES public.aula(id);


--
-- Name: hora hora_materiafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.hora
    ADD CONSTRAINT hora_materiafk FOREIGN KEY (materia) REFERENCES public.materia(id);


--
-- Name: nota nota_alumnofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_alumnofk FOREIGN KEY (alumno) REFERENCES public.alumno(id);


--
-- Name: nota nota_materiafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota
    ADD CONSTRAINT nota_materiafk FOREIGN KEY (materia) REFERENCES public.materia(id);


--
-- PostgreSQL database dump complete
--


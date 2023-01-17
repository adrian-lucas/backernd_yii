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
    alumo integer NOT NULL,
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
    codigi_sis character varying NOT NULL,
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
    materia integer NOT NULL
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

COPY public.alumno_materia (id, alumo, materia) FROM stdin;
\.


--
-- Data for Name: aula; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.aula (id, nombre, capacidad) FROM stdin;
\.


--
-- Data for Name: hora; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.hora (id, dia, hora_inicio, hora_fin, aula, materia) FROM stdin;
\.


--
-- Data for Name: materia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materia (id, codigi_sis, nombre) FROM stdin;
\.


--
-- Data for Name: nota; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nota (id, gestion, alumno, materia) FROM stdin;
\.


--
-- Name: alumno_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_id_seq', 3, true);


--
-- Name: alumno_materia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_materia_id_seq', 1, false);


--
-- Name: aula_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.aula_id_seq', 1, false);


--
-- Name: hora_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.hora_id_seq', 1, false);


--
-- Name: materia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materia_id_seq', 1, false);


--
-- Name: nota_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nota_id_seq', 1, false);


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
    ADD CONSTRAINT alumno_materia_alumnofk FOREIGN KEY (alumo) REFERENCES public.alumno(id);


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


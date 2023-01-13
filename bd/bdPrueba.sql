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
-- Name: alumno_materia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumno_materia (
    id integer NOT NULL,
    alumnos_id integer NOT NULL,
    materias_id integer NOT NULL
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
-- Name: alumnos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alumnos (
    id integer NOT NULL,
    nombre character varying NOT NULL
);


ALTER TABLE public.alumnos OWNER TO postgres;

--
-- Name: alumnos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alumnos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alumnos_id_seq OWNER TO postgres;

--
-- Name: alumnos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alumnos_id_seq OWNED BY public.alumnos.id;


--
-- Name: materias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.materias (
    id integer NOT NULL,
    nombre_materia character varying NOT NULL,
    cod_materia character varying NOT NULL
);


ALTER TABLE public.materias OWNER TO postgres;

--
-- Name: materias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.materias_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.materias_id_seq OWNER TO postgres;

--
-- Name: materias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.materias_id_seq OWNED BY public.materias.id;


--
-- Name: alumno_materia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia ALTER COLUMN id SET DEFAULT nextval('public.alumno_materia_id_seq'::regclass);


--
-- Name: alumnos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumnos ALTER COLUMN id SET DEFAULT nextval('public.alumnos_id_seq'::regclass);


--
-- Name: materias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materias ALTER COLUMN id SET DEFAULT nextval('public.materias_id_seq'::regclass);


--
-- Data for Name: alumno_materia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alumno_materia (id, alumnos_id, materias_id) FROM stdin;
\.


--
-- Data for Name: alumnos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alumnos (id, nombre) FROM stdin;
5	lucas
1	lucas
6	pepito
7	jaime
8	eduardo
\.


--
-- Data for Name: materias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.materias (id, nombre_materia, cod_materia) FROM stdin;
\.


--
-- Name: alumno_materia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumno_materia_id_seq', 1, false);


--
-- Name: alumnos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alumnos_id_seq', 8, true);


--
-- Name: materias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.materias_id_seq', 1, false);


--
-- Name: alumno_materia alumno_materia_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_pk PRIMARY KEY (id);


--
-- Name: alumnos alumnos_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumnos
    ADD CONSTRAINT alumnos_pk PRIMARY KEY (id);


--
-- Name: materias materias_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.materias
    ADD CONSTRAINT materias_pk PRIMARY KEY (id);


--
-- Name: alumno_materia alumno_materia_alumnos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_alumnos_fk FOREIGN KEY (alumnos_id) REFERENCES public.alumnos(id);


--
-- Name: alumno_materia alumno_materia_materias_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alumno_materia
    ADD CONSTRAINT alumno_materia_materias_fk FOREIGN KEY (materias_id) REFERENCES public.materias(id);


--
-- PostgreSQL database dump complete
--


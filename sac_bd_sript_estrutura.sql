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
-- Name: chamados; Type: TABLE; Schema: public; Owner: bpaolo; Tablespace: 
--

CREATE TABLE chamados (
    id integer NOT NULL,
    titulo character varying(150) NOT NULL,
    observacao text NOT NULL,
    pedido_id integer NOT NULL
);


ALTER TABLE chamados OWNER TO bpaolo;

--
-- Name: chamados_id_seq; Type: SEQUENCE; Schema: public; Owner: bpaolo
--

CREATE SEQUENCE chamados_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE chamados_id_seq OWNER TO bpaolo;

--
-- Name: clientes; Type: TABLE; Schema: public; Owner: bpaolo; Tablespace: 
--

CREATE TABLE clientes (
    id integer NOT NULL,
    nome character varying(50) NOT NULL,
    email character varying(50) NOT NULL
);


ALTER TABLE clientes OWNER TO bpaolo;

--
-- Name: clientes_id_seq; Type: SEQUENCE; Schema: public; Owner: bpaolo
--

CREATE SEQUENCE clientes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clientes_id_seq OWNER TO bpaolo;

--
-- Name: pedidos; Type: TABLE; Schema: public; Owner: bpaolo; Tablespace: 
--

CREATE TABLE pedidos (
    id integer NOT NULL,
    numero character varying(255) NOT NULL,
    cliente_id integer NOT NULL
);


ALTER TABLE pedidos OWNER TO bpaolo;

--
-- Name: pedidos_id_seq; Type: SEQUENCE; Schema: public; Owner: bpaolo
--

CREATE SEQUENCE pedidos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedidos_id_seq OWNER TO bpaolo;

--
-- Data for Name: chamados; Type: TABLE DATA; Schema: public; Owner: bpaolo
--

INSERT INTO chamados VALUES (1, 'teste chamado', 'obs chamado', 1);


--
-- Name: chamados_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bpaolo
--

SELECT pg_catalog.setval('chamados_id_seq', 1, true);


--
-- Data for Name: clientes; Type: TABLE DATA; Schema: public; Owner: bpaolo
--

INSERT INTO clientes VALUES (3, 'Bruno', 'bpaolo@gmail.com');


--
-- Name: clientes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bpaolo
--

SELECT pg_catalog.setval('clientes_id_seq', 3, true);


--
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: bpaolo
--

INSERT INTO pedidos VALUES (1, '1', 3);


--
-- Name: pedidos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: bpaolo
--

SELECT pg_catalog.setval('pedidos_id_seq', 1, true);


--
-- Name: chamados_pkey; Type: CONSTRAINT; Schema: public; Owner: bpaolo; Tablespace: 
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT chamados_pkey PRIMARY KEY (id);


--
-- Name: clientes_pkey; Type: CONSTRAINT; Schema: public; Owner: bpaolo; Tablespace: 
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id);


--
-- Name: pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: bpaolo; Tablespace: 
--

ALTER TABLE ONLY pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id);


--
-- Name: idx_6716ccaade734e51; Type: INDEX; Schema: public; Owner: bpaolo; Tablespace: 
--

CREATE INDEX idx_6716ccaade734e51 ON pedidos USING btree (cliente_id);


--
-- Name: idx_c638b1c44854653a; Type: INDEX; Schema: public; Owner: bpaolo; Tablespace: 
--

CREATE INDEX idx_c638b1c44854653a ON chamados USING btree (pedido_id);


--
-- Name: fk_6716ccaade734e51; Type: FK CONSTRAINT; Schema: public; Owner: bpaolo
--

ALTER TABLE ONLY pedidos
    ADD CONSTRAINT fk_6716ccaade734e51 FOREIGN KEY (cliente_id) REFERENCES clientes(id);


--
-- Name: fk_c638b1c44854653a; Type: FK CONSTRAINT; Schema: public; Owner: bpaolo
--

ALTER TABLE ONLY chamados
    ADD CONSTRAINT fk_c638b1c44854653a FOREIGN KEY (pedido_id) REFERENCES pedidos(id);


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


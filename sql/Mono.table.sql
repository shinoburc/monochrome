CREATE TABLE "monos" (
    "id"        char(32) NOT NULL,
    "name"      varchar(512) NOT NULL,
    "semantic"  varchar(128),
    CONSTRAINT "mono_p" PRIMARY KEY ("id")
);
CREATE TABLE "int_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     bigint,
    CONSTRAINT "int_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "float_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     float,
    CONSTRAINT "float_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "text_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     text,
    CONSTRAINT "text_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "timestamp_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     timestamp,
    CONSTRAINT "timestamp_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "clob_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     text,
    CONSTRAINT "clob_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "file_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     varchar(256),
    CONSTRAINT "file_p" PRIMARY KEY ("id","name")
);
CREATE TABLE "alias_associations" (
    "id"        char(32) NOT NULL,
    "name"      varchar(128) NOT NULL,
    "value"     char(32),
    CONSTRAINT "alias_p" PRIMARY KEY ("id","name")
);

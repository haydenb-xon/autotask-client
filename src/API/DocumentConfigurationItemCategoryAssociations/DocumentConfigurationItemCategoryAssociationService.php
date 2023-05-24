<?php

namespace Anteris\Autotask\API\DocumentConfigurationItemCategoryAssociations;

use Anteris\Autotask\HttpClient;
use Anteris\Autotask\Support\EntityFields\EntityFieldCollection;
use Anteris\Autotask\Support\EntityInformation\EntityInformationEntity;
use GuzzleHttp\Psr7\Response;

/**
 * Handles all interaction with Autotask DocumentConfigurationItemCategoryAssociations.
 * @see https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/Entities/DocumentConfigurationItemCategoryAssociationsEntity.htm Autotask documentation.
 */
class DocumentConfigurationItemCategoryAssociationService
{
    /** @var Client An HTTP client for making requests to the Autotask API. */
    protected HttpClient $client;
    /**
     * Instantiates the class.
     *
     * @param  HttpClient  $client  The http client that will be used to interact with the API.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * Creates a new documentconfigurationitemcategoryassociation.
     *
     * @param  DocumentConfigurationItemCategoryAssociationEntity  $resource  The documentconfigurationitemcategoryassociation entity to be written.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function create(DocumentConfigurationItemCategoryAssociationEntity $resource): Response
    {
        return $this->client->post("DocumentConfigurationItemCategoryAssociations", $resource->toArray());
    }

    /**
     * Deletes an entity by its ID.
     *
     * @param  int  $id  ID of the DocumentConfigurationItemCategoryAssociation to be deleted.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function deleteById(int $id): void
    {
        $this->client->delete("DocumentConfigurationItemCategoryAssociations/$id");
    }

    /**
     * Finds the DocumentConfigurationItemCategoryAssociation based on its ID.
     *
     * @param  string $id  ID of the entity to be retrieved.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function findById(int $id): DocumentConfigurationItemCategoryAssociationEntity
    {
        return DocumentConfigurationItemCategoryAssociationEntity::fromResponse(
            $this->client->get("DocumentConfigurationItemCategoryAssociations/$id")
        );
    }

    /**
     * Returns information about what fields an entity has.
     *
     * @see EntityFieldCollection
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityFields(): EntityFieldCollection
    {
        return EntityFieldCollection::fromResponse(
            $this->client->get("DocumentConfigurationItemCategoryAssociations/entityInformation/fields")
        );
    }

    /**
     * Returns information about what actions can be made against an entity.
     *
     * @see EntityInformationEntity
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function getEntityInformation(): EntityInformationEntity
    {
        return EntityInformationEntity::fromResponse(
            $this->client->get("DocumentConfigurationItemCategoryAssociations/entityInformation")
        );
    }

    /**
     * Returns an instance of the query builder for this entity.
     *
     * @see DocumentConfigurationItemCategoryAssociationQueryBuilder The query builder class.
     *
     * @author Aidan Casey <aidan.casey@anteris.com>
     */
    public function query(): DocumentConfigurationItemCategoryAssociationQueryBuilder
    {
        return new DocumentConfigurationItemCategoryAssociationQueryBuilder($this->client);
    }
}

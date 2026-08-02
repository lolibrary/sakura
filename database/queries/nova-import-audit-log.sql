insert into activity_log (log_name, description, subject_type, subject_id,
                          event, causer_type, causer_id,
                          attribute_changes,
                          properties, created_at, updated_at)
select 'nova'                     as log_name,
       'event imported from nova' as description,
       actionable_type            as subject_type,
       actionable_id              as subject_id,
       name                       as event,
       'App\Models\User'          as causer_type,
       user_id                    as cause_id,
       case
           when changes = '' then '{}'::jsonb
           else jsonb_object(array['attributes', 'old'], array[changes, original])
           end                    as attribute_changes,
       jsonb_object(
           array[
               'batch_id', 'nova_id',
           'target_type', 'target_id',
           'model_type', 'model_id', 'status'
               ],
           array[
               batch_id, id::text,
           target_type, target_id,
           model_type, model_id, status ]
       )                          as properties,
       created_at                 as created_at,
       updated_at                 as updated_at
from action_events;
